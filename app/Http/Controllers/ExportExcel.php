<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\ExportAdmin;
use App\Exports\ExportStudent;
use App\Exports\ExportTeacher;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ExportExcel extends Controller
{
    public function AdminExportExcel()
    {
        return Excel::download(new ExportAdmin, 'All-Admin_' . date('d:m:Y H:i:s') . '.xlsx');
    }

    public function TeacherExportExcel()
    {
        return Excel::download(new ExportTeacher, 'All-teacher_' . date('d:m:Y H:i:s') . '.xlsx');
    }

    public function StudentExportExcel()
    {
        return Excel::download(new ExportStudent,'All-Student_' . date('d:m:Y H:i:s') . '.xlsx');
    }
}
