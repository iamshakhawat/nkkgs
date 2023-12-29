<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Models\Subject;
use App\Mail\ForgetPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index()
    {
        $students = count(User::where('role','=','student')->get());
        $teachers = count(User::where('role','=','teacher')->get());
        $gurdians = count(User::where('role','=','gurdian')->get());
        $admins = count(User::where('role','=','admin')->get());
        return view('backend.index',compact('students','teachers','gurdians','admins'));
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
        return view('backend.admin.profile', compact('user'));
    }


    public function edit()
    {
        $user = User::find(Auth::user()->id);
        return view('backend.admin.edit-profile', compact('user'));
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
        return view('backend.admin.settings');
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
            $url = request()->getSchemeAndHttpHost() . "/verify?token=$token";

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
        return redirect()->route('login')->withIcon('success')->withMessege('Password Change Successfully!');
    }


    public function allAdmin(Request $request)
    {
        $search = $request->search;
        $filter = $request->filter;

        $query = User::query()->where('role','admin');

        if ($search != "") {
            $query->where('fname','LIKE',"%$search%");
        }
        if($filter != "" && $filter == 'a2z'){
            $query->orderBy('fname','asc');
        }
        if($filter != "" && $filter == 'z2a'){
            $query->orderBy('fname','desc');
        }
        if($filter != "" && $filter == 'active'){
            $query->where('status', '=', 1);
        }

        $admins = $query->paginate(10); 

        return view('backend.admin.all-admin', compact('admins', 'search', 'filter'));
    }

    public function previewAdmin($id)
    {
        $admin = User::find($id);
        return view('backend.admin.preview-admin', compact('admin'));
    }

    public function editAdmin($id)
    {
        $admin = User::find($id);
        return view('backend.admin.edit-admin', compact('admin'));
    }

    public function moveTrashAdmin($id){
        User::destroy($id);
        return redirect()->back()->withIcon('success')->withMessege('Admin Delete Successfull!');
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
        User::where('id', $id)->forceDelete();
        return redirect()->back()->withIcon('success')->withMessege('Admin Delete Successfull!');
    }
    public function addAdmin()
    {
        return view('backend.admin.add-admin');
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
            'name' => $request->fname . ' ' . $request->lname,
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

    // Trash

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
                    $admins = User::onlyTrashed()->where('role', 'admin')->where('status', '=', 1)->orderBy('fname', 'asc')->paginate(10);
                }
            } else {
                $admins = User::onlyTrashed()->where('role', 'admin')->orderBy('fname', 'asc')->paginate(10);
            }
        }

        return view('backend.admin.admin-trash', compact('admins', 'search', 'filter'));
    }

    public function adminRestore($id)
    {
        $admin = User::withTrashed()->find($id);
        if (!is_null($admin)) {
            $admin->restore();
        }
        return redirect()->back()->withIcon('success')->withMessege('Admin Restored Successfully!');
    }

    public function allParent(){
        $parents = User::where('role','gurdian')->paginate(20);
        return view('backend.parent.all-parents',compact('parents'));
    }

    public function parentProfile($id){
        $parent = User::find($id);
        return view('backend.parent.parent-profile',compact('parent'));
    }

    public function editProfile($id){
        $parent = User::find($id);
        return view('backend.parent.edit-parent-profile',compact('parent'));
    }

    public function moveToTrash(Request $request){
        $id = $request->user_id;
        $dbimage = User::find($id)->photo;
        if ($dbimage != "") {
            $path = public_path('/upload/users') . '/' . $dbimage;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        User::where('id',$id)->forceDelete();
        return redirect()->back()->withIcon('success')->withMessege('Parent Delete Successfull!');
    }

    public function updateParent(Request $request){

        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'phone' => 'required|numeric',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg',
            'id' => 'required',
        ]);

        DB::table('users')->where('id', $request->id)->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'name' => $request->fname.' '.$request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'blood_group' => $request->blood,
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

    public function addparent(){
        return view('backend.parent.add-parent');
    }
    
    public function insertParent(Request $request){
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'gender' => 'required|string',
            'blood' => 'required|string',
            'password' => 'required|min:6|same:confirm_password',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);
        $imagename = null;
        if ($request->file('photo')) {
            $imagename = $request->fname . '_' . time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('/upload/users/'), $imagename);
        }

        $parent = new User();

        $parent->fname = $request->fname;
        $parent->lname = $request->lname;
        $parent->name = $request->fname.' '.$request->lname;
        $parent->email = $request->email;
        $parent->phone = $request->phone;
        $parent->gender = $request->gender;
        $parent->blood_group = $request->blood;
        $parent->password = Hash::make($request->password);
        $parent->photo = $imagename;
        $parent->role = 'gurdian';
        $parent->save();

        return redirect()->route('parent.all')->withIcon('success')->withMessege('Parent Added Successfully!');

    }

    // Student 
    public function studentProfile($id)
    {
        $student = User::find($id);
        return view('backend.student.student-profile', compact('student'));
    }

    public function allStudent(Request $request)
    {
        $shift = $request->shift;
        $class = $request->class;
        $section = $request->section;
        $roll = $request->roll;
        $name = $request->name;

        $query = User::query();

        if ($shift != "") {
            $query->where('shift', '=', $shift);
        }
        if ($class != "") {
            $query->where('class', '=', $class);
        }
        if ($section != "") {
            $query->where('section', '=', $section);
        }
        if ($roll != "") {
            $query->where('roll', '=', $roll);
        }
        if ($name != "") {
            $query->where('name', 'LIKE', "%$name%");
        }


        $total = count($query->where('role', '=', 'student')->get());

        $students = $query->where('role', '=', 'student')->orderBy('id','desc')->paginate(20);


        return view('backend.student.all-students', compact('students', 'shift', 'class', 'section', 'roll', 'name', 'total'));
    }

    public function allStudentList(Request $request)
    {
        $shift = $request->shift;
        $class = $request->class;
        $section = $request->section;
        $roll = $request->roll;
        $name = $request->name;

        $query = User::query();

        if ($shift != "") {
            $query->where('shift', '=', $shift);
        }
        if ($class != "") {
            $query->where('class', '=', $class);
        }
        if ($section != "") {
            $query->where('section', '=', $section);
        }
        if ($roll != "") {
            $query->where('roll', '=', $roll);
        }
        if ($name != "") {
            $query->where('name', 'LIKE', "%$name%");
        }


        $total = count($query->where('role', '=', 'student')->get());

        $students = $query->where('role', '=', 'student')->paginate(20);


        return view('backend.student.all-students-list', compact('students', 'shift', 'class', 'section', 'roll', 'name', 'total'));
    }


    public function studentTrash()
    {
        $total = count(User::where('role', '=', 'student')->onlyTrashed()->get());

        $students = User::where('role', '=', 'student')->onlyTrashed()->paginate(20);


        return view('backend.student.all-students-trash', compact('students', 'total'));
    }

    public function restoreStudent($id)
    {
        User::withTrashed()->find($id)->restore();
        return redirect()->back()->withIcon('success')->withMessege('Student Restore Successfull!');
    }

    public function movetoTrashStudent(Request $request)
    {

        User::destroy($request->user_id);
        return redirect()->back()->withIcon('success')->withMessege('Student Move To Trash');
    }

    public function deleteStudent(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
        ]);

        // Delete Profile Picture
        $dbimage = User::withTrashed()->find($request->user_id)->photo;
        if ($dbimage != "") {
            $path = public_path('/upload/users') . '/' . $dbimage;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        User::where('id', $request->user_id)->forceDelete();
        return redirect()->back()->withIcon('success')->withMessege('Student Delete Successfull!');
    }

    public function editStudent($id)
    {
        $student = User::find($id);
        return view('backend.student.edit-student', compact('student'));
    }

    public function updateStudent(Request $request)
    {


        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'user_id' => 'required|string',
            'class' => 'required|string',
            'section' => 'required|string',
            'dob' => 'required',
            'roll' => 'required',
            'shift' => 'required|string',
            'gender' => 'required|string',
            'religion' => 'required|string',
            'blood' => 'required|string',
            'nationality' => 'required|string',

            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'parent_email' => 'required|email',
            'parent_phone' => 'required',
            'emergency_contact' => 'required',

            'email' => 'required|email|unique:users,email,' . $request->id,
            'phone' => 'required|numeric',
            'current_address' => 'required|string',
            'parmanent_address' => 'required|string',
        ]);


        $imagename = null;
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

        DB::table('users')->where('id',$request->id)->update([

            'fname' => $request->fname,
            'lname' => $request->lname,
            'name' => $request->fname . ' ' . $request->lname,
            'user_id' => $request->user_id,
            'class' => $request->class,
            'section' => $request->section,
            'dob' => $request->dob,
            'roll' => $request->roll,
            'shift' => $request->shift,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'blood_group' => $request->blood,
            'nationality' => $request->nationality,

            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'parent_email' => $request->parent_email,
            'parent_phone' => $request->parent_phone,
            'emergency_contact' => $request->emergency_contact,

            'email' => $request->email,
            'phone' => $request->phone,
            'current_address' => $request->current_address,
            'parmanent_address' => $request->parmanent_address,

        ]);

        return redirect()->back()->withIcon('success')->withMessege('Student Updated!');
    }

    public function addStudent()
    {
        return view('backend.student.add-student');
    }
    
    public function insertStudent(Request $request)
    {
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'user_id' => 'required|string',
            'class' => 'required|string',
            'section' => 'required|string',
            'dob' => 'required',
            'roll' => 'required',
            'shift' => 'required|string',
            'gender' => 'required|string',
            'religion' => 'required|string',
            'blood' => 'required|string',
            'nationality' => 'required|string',

            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'parent_email' => 'required|email',
            'parent_phone' => 'required',
            'emergency_contact' => 'required',

            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric',
            'current_address' => 'required|string',
            'parmanent_address' => 'required|string',
            'password' => 'required|same:confirm_password|min:6',
            'photo' => 'required|mimes:jpg,png,jpeg',
        ]);

        $student = new User();

        $imagename = null;

        if ($request->file('photo')) {
            $imagename = $request->fname . '_' . time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('/upload/users/'), $imagename);
            $student->photo = $imagename;
        }

        $student->fname = $request->fname;
        $student->lname = $request->lname;
        $student->name = $request->fname.' '.$request->lname;
        $student->user_id = $request->user_id;
        $student->class = $request->class;
        $student->section = $request->section;
        $student->dob = $request->dob;
        $student->roll = $request->roll;
        $student->shift = $request->shift;
        $student->gender = $request->gender;
        $student->religion = $request->religion;
        $student->blood_group = $request->blood;
        $student->nationality = $request->nationality;

        $student->father_name = $request->father_name;
        $student->mother_name = $request->mother_name;
        $student->parent_email = $request->parent_email;
        $student->parent_phone = $request->parent_phone;
        $student->emergency_contact = $request->emergency_contact;

        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->current_address = $request->current_address;
        $student->parmanent_address = $request->parmanent_address;
        $student->password = Hash::make($request->password);
        $student->role = 'student';
        $student->save();

        
        return redirect()->route('admin.all.student')->withIcon('success')->withMessege('Student Added!');
    }

    public function tc(){
        return view('TC.tc');
    }

    public function previewTc(){
        return view('TC.preview-tc');
    }

    public function AllTeacher(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $searchSubject = $request->subject;

        if ($id != "") {
            $teachers = User::where('role', 'teacher')->where('user_id', 'LIKE', "%$id%")->paginate(20);
        }
        if ($name != "") {
            $teachers = User::where('role', 'teacher')->where('name', "LIKE", "%$name%")->paginate(20);
        }
        if ($searchSubject != "") {
            $teachers = User::where('role', 'teacher')->where('subject', '=', $searchSubject)->paginate(20);
        }
        if ($id != "" && $name != "") {
            $teachers = User::where('role', 'teacher')->orWhere('user_id', $id)->where('name', "LIKE", "%$name%")->paginate(20);
        }
        if ($id != "" && $searchSubject != "") {
            $teachers = User::where('role', 'teacher')->orWhere('user_id', $id)->where('subject', '=', $searchSubject)->paginate(20);
        }
        if ($name != "" && $searchSubject != "") {
            $teachers = User::where('role', 'teacher')->where('name', "LIKE", "%$name%")->where('subject', '=', $searchSubject)->paginate(20);
        }

        if ($id == '' && $name == '' && $searchSubject == '') {
            $teachers = User::where('role', 'teacher')->paginate(20);
        }
        $subjects = Subject::all();
        return view('backend.teacher.all-teachers', compact('teachers', 'subjects', 'id', 'searchSubject', 'name'));
    }

    public function AllTeacherList(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $searchSubject = $request->subject;

        if ($id != "") {
            $teachers = User::where('role', 'teacher')->where('user_id', 'LIKE', "%$id%")->paginate(20);
        }
        if ($name != "") {
            $teachers = User::where('role', 'teacher')->where('name', "LIKE", "%$name%")->paginate(20);
        }
        if ($searchSubject != "") {
            $teachers = User::where('role', 'teacher')->where('subject', '=', $searchSubject)->paginate(20);
        }
        if ($id != "" && $name != "") {
            $teachers = User::where('role', 'teacher')->orWhere('user_id', $id)->where('name', "LIKE", "%$name%")->paginate(20);
        }
        if ($id != "" && $searchSubject != "") {
            $teachers = User::where('role', 'teacher')->orWhere('user_id', $id)->where('subject', '=', $searchSubject)->paginate(20);
        }
        if ($name != "" && $searchSubject != "") {
            $teachers = User::where('role', 'teacher')->where('name', "LIKE", "%$name%")->where('subject', '=', $searchSubject)->paginate(20);
        }

        if ($id == '' && $name == '' && $searchSubject == '') {
            $teachers = User::where('role', 'teacher')->paginate(20);
        }
        $subjects = Subject::all();
        return view('backend.teacher.all-teachers-list', compact('teachers', 'subjects', 'id', 'searchSubject', 'name'));
    }

    public function SingleTeacher($id)
    {
        $teacher = User::find($id);
        return view('backend.teacher.teacher-profile', compact('teacher'));
    }

    public function EditTeacher($id)
    {
        $teacher = User::find($id);
        $subjects = Subject::all();
        return view('backend.teacher.edit-teacher', compact('teacher', 'subjects'));
    }

    public function UpdateTeacher(Request $request)
    {
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'phone' => 'required|numeric|max:99999999999',
            'user_id' => 'required|string',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg',
            'id' => 'required',
            'subject' => 'required',
        ]);

        DB::table('users')->where('id', $request->id)->update([
            'name' => $request->fname . ' ' . $request->lname,
            'fname' => $request->fname,
            'user_id' => $request->user_id,
            'email' => $request->email,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'lname' => $request->lname,
            'joining_date' => $request->joining_date,
            'phone' => $request->phone,
            'nationality' => $request->nationality,
            'blood_group' => $request->blood,
            'subject' => $request->subject,
            'current_address' => $request->current_address,
            'parmanent_address' => $request->parmanent_address,
            'about_me' => $request->about_me,
            'qualification' => $request->qualification,
            'experience' => $request->experience,
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

    public function AddTeacher()
    {
        $subjects = Subject::all();
        return view('backend.teacher.add-teacher', compact('subjects'));
    }

    public function AddNewTeacher(Request $request)
    {
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|max:99999999999',
            'user_id' => 'required|string',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg',
            'subject' => 'required',
            'password' => 'required|same:confirm_password|min:6',
            'confirm_password' => 'required|min:6',
        ]);

        $imagename = null;

        if ($request->file('photo')) {
            $imagename = $request->fname . '_' . time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('/upload/users/'), $imagename);
        }

        DB::table('users')->insert([
            'name' => $request->fname . ' ' . $request->lname,
            'fname' => $request->fname,
            'user_id' => $request->user_id,
            'email' => $request->email,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'lname' => $request->lname,
            'joining_date' => $request->joining_date,
            'phone' => $request->phone,
            'nationality' => $request->nationality,
            'blood_group' => $request->blood,
            'subject' => $request->subject,
            'current_address' => $request->current_address,
            'parmanent_address' => $request->parmanent_address,
            'about_me' => $request->about_me,
            'qualification' => $request->qualification,
            'experience' => $request->experience,
            'role' => 'teacher',
            'password' => Hash::make($request->password),
            'photo' => $imagename
        ]);



        return redirect()->back()->withIcon('success')->withMessege('Teacher Add Successfully!');
    }

    public function DeleteTeacher(Request $request)
    {
        User::destroy($request->user_id);
        return redirect()->back()->withIcon('success')->withMessege('Teacher Delete Successfull!');
    }

    public function teacherTrash(){
        $teachers = User::onlyTrashed()->where('role','=','teacher')->paginate(10);
        return view('backend.teacher.teacher-trash',compact('teachers'));
    }

    public function forceDeleteTeacher(Request $request){
        $request->validate([
            'user_id' => 'required',
        ]);

        // Delete Profile Picture
        $dbimage = User::onlyTrashed()->find($request->user_id)->photo;
        if ($dbimage != "") {
            $path = public_path('/upload/users') . '/' . $dbimage;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        User::where('id',$request->user_id)->forceDelete();
        return redirect()->back()->withIcon('success')->withMessege('Teacher Delete Successfull!');
    }

    public function restoreTeacher($id){
        User::withTrashed()->find($id)->restore();
        return redirect()->back()->withIcon('success')->withMessege('Teacher Restore Successfull!');
    }


}
