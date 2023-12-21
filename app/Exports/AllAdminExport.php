<?php

namespace App\Exports;

use App\Models\user;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AllAdminExport implements FromView
{

    public function view(): View
    {
        return view('backend.exports.admins-exports', [
            'admins' => User::where('role','=','admin')->get(),
        ]);
    }
}
