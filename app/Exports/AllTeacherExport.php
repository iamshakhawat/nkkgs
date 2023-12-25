<?php

namespace App\Exports;

use App\Models\user;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AllTeacherExport implements FromView
{
    public function view(): View
    {
        return view('backend.exports.teacher-exel-exports', [
            'teachers' => User::where('role','=','teacher')->get(),
        ]);
    }
}
