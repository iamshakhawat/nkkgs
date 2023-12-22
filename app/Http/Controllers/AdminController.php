<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Mail\ForgetPassword;
use Illuminate\Http\Request;
use App\Exports\AllAdminExport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index()
    {
        return view('backend.index');
    }

    public function logout(Request $request)
    {
        $email = Auth::user()->email;
        DB::table('users')->where('email', "$email")->update([
            'status' => 0,
        ]);
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('backend.profile', compact('user'));
    }


    public function edit()
    {
        $user = User::find(Auth::user()->id);
        return view('backend.edit-profile', compact('user'));
    }

    public function updateAdmin(Request $request)
    {
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'phone' => 'required|numeric',
            'user_id' => 'required|string',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg',
            'id' => 'required',
        ]);

        DB::table('users')->where('id', $request->id)->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'blood_group' => $request->blood,
            'user_id' => $request->user_id,
            'current_address' => $request->present_address,
            'parmanent_address' => $request->parmanent_address,
        ]);

        if ($request->file('photo')) {
            $dbimage = User::find($request->id)->photo;
            if ($dbimage != "") {
                $path = public_path('/upload/users') . '/' . $dbimage;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $imagename = $request->fname . '_' . time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('/upload/users/'), $imagename);
            DB::table('users')->where('id', $request->id)->update([
                'photo' => $imagename
            ]);
        }
        return redirect()->back()->withIcon('success')->withMessege('Profile Updated Successfully!');
    }

    public function settings()
    {
        return view('backend.settings');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6|same:confirm_password',
            'confirm_password' => 'required|min:6',
        ]);

        $currentPassword = Hash::check($request->old_password, Auth::user()->password);
        if ($currentPassword) {
            DB::table('users')->where('id', Auth::user()->id)->update([
                'password' => Hash::make($request->new_password),
            ]);
            return redirect()->back()->withIcon('success')->withMessege('Password Change Successfully!');
        } else {
            return redirect()->back()->withIcon('error')->withMessege('Incorrect Old Password!');
        }
    }

    public function deleteAccount(Request $request)
    {

        $checkPass = Hash::check($request->password, Auth::user()->password);
        if ($checkPass) {
            // Delete Profile Picture
            $dbimage = User::find(Auth::user()->id)->photo;
            if ($dbimage != "") {
                $path = public_path('/upload/users') . '/' . $dbimage;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            User::destroy(Auth::user()->id);
            Auth::guard('web')->logout();
            return redirect('/');
        } else {
            return redirect()->route('admin.settings')->withIcon('error')->withMessege('Password Incorrect!');
        }
    }

    public function forgetPassword()
    {
        return view('backend.forget-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $checkEmail = User::where('email', $request->email)->get();

        if (sizeof($checkEmail) == 0) {
            return redirect()->back()->withIcon('error')->withMessege("'$request->email' is not exist!");
        } else {

            $token = md5(uniqid());
            $user = DB::table('users')->where('email', $request->email)->get();
            $name = $user[0]->fname . ' ' . $user[0]->lname;
            $url = request()->getSchemeAndHttpHost() . "/admin/verify?token=$token";

            $maildata = [
                'name' => $name,
                'url' => $url,
            ];

            if (Mail::to($request->email)->send(new ForgetPassword($maildata))) {

                date_default_timezone_set('Asia/Dhaka');
                DB::table('users')->where('email', $request->email)->update([
                    'remember_token' => $token,
                    'email_verified_at' => date('Y-m-d H:i:s'),
                ]);
                return redirect()->back()->withIcon('success')->withMessege("Check your Mail");
            } else {
                return redirect()->back()->withIcon('error')->withMessege("Something went wrong!");
            }
        }
    }


    public function verifyEmail(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        $token = $request->token;
        $dbdata = User::where('remember_token', $token)->get();

        try {
            $id = $dbdata[0]->id;
            $dbtoken = $dbdata[0]->remember_token;
            $email_verified_at = $dbdata[0]->email_verified_at;
            $dbverifytime = new DateTime($email_verified_at);
            $resetTime = $dbverifytime->getTimestamp();
            $currentTime = time() - 300; // After 300 second this link will be expired
        } catch (\Throwable $th) {
            return view('backend.template.invalid-token');
        }

        if ($resetTime >= $currentTime) {
            if ($dbtoken === $token) {
                return view('backend.new-password', compact('id'));
            } else {
                return view('backend.template.invalid-token');
            }
        } else {
            return view('backend.template.expired-token');
        }
    }

    public function setNewPassword(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'new_password' => 'required|min:6|same:confirm_password',
            'confirm_password' => 'required|min:6'
        ]);
        DB::table('users')->where('id', $request->id)->update([
            'password' => Hash::make($request->new_password),
        ]);
        return redirect()->route('admin.profile')->withIcon('success')->withMessege('Password Change Successfully!');
    }


    public function allAdmin(Request $request)
    {
        $search = $request->search;
        $filter = $request->filter;

        if ($search != "") {
            if ($filter != "") {
                if ($filter == 'a2z') {
                    $admins = User::where('role', 'admin')->where('fname', "LIKE", "%$search%")->orWhere('lname', "LIKE", "%$search%")->orderBy('fname', 'asc')->paginate(10);
                }
                if ($filter == 'z2a') {
                    $admins = User::where('role', 'admin')->where('fname', "LIKE", "%$search%")->orWhere('lname', "LIKE", "%$search%")->orderBy('fname', 'desc')->paginate(10);
                }
                if ($filter == 'active') {
                    $admins = User::where('role', 'admin')->where('status', '=', 1)->paginate(10);
                }
            } else {
                $admins = User::where('role', 'admin')->where('fname', "LIKE", "%$search%")->orWhere('lname', "LIKE", "%$search%")->orderBy('fname', 'asc')->paginate(10);
            }
        } else {
            if ($filter != "") {
                if ($filter == 'a2z') {
                    $admins = User::where('role', 'admin')->orderBy('fname', 'asc')->paginate(10);
                }
                if ($filter == 'z2a') {
                    $admins = User::where('role', 'admin')->orderBy('fname', 'desc')->paginate(10);
                }
                if ($filter == 'active') {
                    $admins = User::where('role', 'admin')->where('status', '=', 1)->orderBy('fname','asc')->paginate(10);
                }
            } else {
                $admins = User::where('role', 'admin')->orderBy('fname', 'asc')->paginate(10);
            }
        }

        return view('backend.all-admin', compact('admins', 'search', 'filter'));
    }

    public function previewAdmin($id)
    {
        $admin = User::find($id);
        return view('backend.preview-admin', compact('admin'));
    }

    public function editAdmin($id)
    {
        $admin = User::find($id);
        return view('backend.edit-admin', compact('admin'));
    }

    public function deleteAdmin($id)
    {
     
        // Delete Profile Picture
        $dbimage = User::onlyTrashed()->find($id)->photo;
        if ($dbimage != "") {
            $path = public_path('/upload/users') . '/' . $dbimage;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        User::where('id',$id)->forceDelete();
        return redirect()->back()->withIcon('success')->withMessege('Admin Delete Successfull!');
    }
    public function addAdmin()
    {
        return view('backend.add-admin');
    }
    public function insertAdmin(Request $request)
    {
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'user_id' => 'required|string',
            'password' => 'required|min:6|same:confrim_password',
            'confrim_password' => 'required|min:6',
            'photo' => 'nullable|mimes:png,jpg,jpeg',
        ]);


        $imagename = null;

        if ($request->file('photo')) {
            $imagename = $request->fname . '_' . time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('/upload/users/'), $imagename);
        }
        DB::table('users')->insert([
            'name' => $request->fname.' '.$request->lname,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'blood_group' => $request->blood,
            'user_id' => $request->user_id,
            'current_address' => $request->present_address,
            'parmanent_address' => $request->parmanent_address,
            'photo' => $imagename,
            'role' => 'admin',
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin.all.admin')->withIcon('success')->withMessege('Admin Add Successfully!');
    }
    public function exportAllAdminexel()
    {
        return Excel::download(new AllAdminExport, 'All-Admin_' . time() . '.xlsx');
    }

    public function exportPdfAdmins()
    {
        $admins = User::where('role', '=', 'admin')->get();
        $pdf = Pdf::loadView('backend.exports.pdf-admin-exports', array('admins' => $admins))->setPaper('a4', 'landscape');
        return $pdf->download('All-Admin_' . time() . '.pdf');

    }


    public function adminTrash(Request $request)
    {
        $search = $request->search;
        $filter = $request->filter;

        if ($search != "") {
            if ($filter != "") {
                if ($filter == 'a2z') {
                    $admins = User::onlyTrashed()->where('role', 'admin')->where('fname', "LIKE", "%$search%")->orWhere('lname', "LIKE", "%$search%")->orderBy('fname', 'asc')->paginate(10);
                }
                if ($filter == 'z2a') {
                    $admins = User::onlyTrashed()->where('role', 'admin')->where('fname', "LIKE", "%$search%")->orWhere('lname', "LIKE", "%$search%")->orderBy('fname', 'desc')->paginate(10);
                }
                if ($filter == 'active') {
                    $admins = User::onlyTrashed()->where('role', 'admin')->where('status', '=', 1)->paginate(10);
                }
            } else {
                $admins = User::onlyTrashed()->where('role', 'admin')->where('fname', "LIKE", "%$search%")->orWhere('lname', "LIKE", "%$search%")->orderBy('fname', 'asc')->paginate(10);
            }
        } else {
            if ($filter != "") {
                if ($filter == 'a2z') {
                    $admins = User::onlyTrashed()->where('role', 'admin')->orderBy('fname', 'asc')->paginate(10);
                }
                if ($filter == 'z2a') {
                    $admins = User::onlyTrashed()->where('role', 'admin')->orderBy('fname', 'desc')->paginate(10);
                }
                if ($filter == 'active') {
                    $admins = User::onlyTrashed()->where('role', 'admin')->where('status', '=', 1)->orderBy('fname','asc')->paginate(10);
                }
            } else {
                $admins = User::onlyTrashed()->where('role', 'admin')->orderBy('fname', 'asc')->paginate(10);
            }
        }

        return view('backend.admin-trash', compact('admins', 'search', 'filter'));
    }

    public function adminRestore($id){
        $admin = User::withTrashed()->find($id);
        if(!is_null($admin)){
            $admin->restore();
        }
        return redirect()->back()->withIcon('success')->withMessege('Admin Restored Successfully!');
    }
}
