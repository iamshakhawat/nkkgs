<?php

namespace App\Exports;

use App\Models\user;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportStudent implements FromView
{
    public function view(): View
    {
        return view('backend.exports.excel-all-student', [
            'students' => User::where('role','=','student')->get(),
        ]);
    }
}
