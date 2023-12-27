<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Container\RewindableGenerator;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\StudentT;
use PhpParser\Node\Expr\FuncCall;

class StudentController extends Controller
{
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

    public function movetoTrash(Request $request)
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
}
