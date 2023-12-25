<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
   
           if($shift != ""){
               $query->where('shift','=',$shift);
           }
           if($class != ""){
               $query->where('class','=',$class);
           }
           if($section != ""){
               $query->where('section','=',$section);
           }
           if($roll != ""){
               $query->where('roll','=',$roll);
           }
           if($name != ""){
               $query->where('name','LIKE',"%$name%");
           }
   
   
           $total = count($query->where('role','=','student')->get());
   
           $students = $query->where('role','=','student')->paginate(20);
   
   
           return view('backend.student.all-students', compact('students', 'shift', 'class', 'section', 'roll','name','total'));
       }
   
       public function deleteStudent(Request $request){
           
           $request->validate([
               'user_id' => 'required',
           ]);
   
           // Delete Profile Picture
           $dbimage = User::find($request->user_id)->photo;
           if ($dbimage != "") {
               $path = public_path('/upload/users') . '/' . $dbimage;
               if (file_exists($path)) {
                   unlink($path);
               }
           }
           User::destroy($request->user_id);
           return redirect()->back()->withIcon('success')->withMessege('Student Delete Successfull!');
   
       }
   
}
