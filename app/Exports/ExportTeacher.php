<?php

namespace App\Exports;

use App\Models\user;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportTeacher implements FromView
{
    public function view(): View
    {
        return view('backend.exports.excel-all-teacher', [
            'teachers' => User::where('role','=','teacher')->get(),
        ]);
    }
}
