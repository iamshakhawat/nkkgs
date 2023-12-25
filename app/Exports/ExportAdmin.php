<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportAdmin implements FromView
{
    public function view(): View
    {
        return view('backend.exports.excel-all-admin', [
            'admins' => User::where('role','=','admin')->get(),
        ]);
    }
}
