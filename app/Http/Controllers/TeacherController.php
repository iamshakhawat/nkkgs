<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
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
