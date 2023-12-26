<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportPDF extends Controller
{
    public function ExportAllAdmin()
    {
        $admins = User::where('role', '=', 'admin')->get();
        $pdf = Pdf::loadView('backend.exports.pdf-all-admin', array('admins' => $admins))->setPaper('a4', 'landscape');
        return $pdf->download('All-Admin_' . date('d:m:Y H:i:s') . '.pdf');
    }      
    public function ExportAllTeacher()
    {
        $teachers = User::where('role', '=', 'teacher')->get();
        $pdf = Pdf::loadView('backend.exports.pdf-all-teacher', array('teachers' => $teachers))->setPaper('a4', 'landscape');
        return $pdf->download('All-Teacher_' . date('d:m:Y H:i:s') . '.pdf');
    }     
    public function ExportAllStudent()
    {
        $students = User::where('role', '=', 'student')->get();
        $pdf = Pdf::loadView('backend.exports.pdf-all-student', array('students' => $students))->setPaper('a2', 'landscape');
        return $pdf->download('All-Teacher' . date('d:m:Y H:i:s') . '.pdf');
    }
    
}
