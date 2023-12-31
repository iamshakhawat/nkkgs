<?php

namespace App\Http\Controllers;

use App\Models\BookList;
use App\Models\Notice;
use App\Models\Tc;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Container\RewindableGenerator;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\StudentT;

class StudentController extends Controller
{
    public function index(){
        $currentNotice = Notice::orderBy('id','desc')->limit(1)->get();
        return view('studentportal.index',compact('currentNotice'));
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

    public function changePassword(){
        return view('studentportal.change-password');
    }

    public function changePasswordPost(Request $request){
        $request->validate([
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6|same:confirm_password',
            'confirm_password' => 'required|min:6'
        ]);

        if(Hash::check($request->old_password,Auth::user()->password)){
            DB::table('users')->update([
                'password' => Hash::make($request->new_password),
            ]);
            return redirect()->back()->withIcon('success')->withMessege('Password Change successfully');
        }else{
            return redirect()->back()->withIcon('error')->withMessege('Incorrect Password');
        }
    }

    public function profile(){
        $student = User::find(Auth()->user()->id);
        return view('studentportal.profile',compact('student'));
    }
    public function editprofile(){
        $student = User::find(Auth()->user()->id);
        return view('studentportal.edit',compact('student'));
    }

    public function editprofilePost(Request $request){
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
            'photo' => 'nullable|image|mimes:jpg,png,jpeg',
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

        return redirect()->route('student.profile')->withIcon('success')->withMessege('Data Updated!');
    }


    public function applyfortc(){
        $tc = Tc::where('student_id',Auth::user()->id)->first();
        $tcstatus = 0;
        try {
            $tcstatus = $tc->status;
        } catch (\Throwable $th) {
        }
        return view('studentportal.applyfortc',compact('tcstatus'));
    }

    public function applyfortcPost(Request $request){
        $request->validate([
            'reason' => 'required|string',
        ]);

        $tc = new Tc();
        $tc->student_id = Auth::user()->id;
        $tc->status = 1;
        $tc->reason = $request->reason;
        $tc->save();
        
        return redirect()->route('student.tcstatus')->withIcon('success')->withMessege('Tc Application Successful!');

    }

    public function tcStatus(){
        $tc = Tc::where('student_id',Auth::user()->id)->first();
        $tcstatus = 0;
        try {
            $tcstatus = $tc->status;
        } catch (\Throwable $th) {
        }
        return view('studentportal.tcstatus',compact('tcstatus','tc'));
    }
    
    public function tcdownload($id)
    {

        $query = Tc::where('tc_id',$id)->first();
        $file = $query->download; 
  
        $student = User::find($query->student_id);

        $filename =$student->fname.'_Transfer_Certificate_'.date('d-m-Y').'.pdf';

        $file= public_path(). "/tc/$file";

        $headers = array(
                  'Content-Type: application/pdf',
                );
    
        return Response::download($file,$filename, $headers);
    }

    public function booklist(){
        $booklists = BookList::where('class',Auth::user()->class)->get();
        return view('studentportal.booklist',compact('booklists'));
    }
    
    public function downloadBook($id)
    {

        $booklist = BookList::find($id);
        $pdf = $booklist->pdf; 
  
        $filename =$booklist->book_name.'_'.uniqid().'.pdf';

        $file= public_path(). "/booklist/pdf/$pdf";

        $headers = array(
                  'Content-Type: application/pdf',
                );
    
        return Response::download($file,$filename, $headers);
    }
}
