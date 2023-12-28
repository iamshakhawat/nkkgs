<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TC extends Controller
{
    public function tc(){
        return view('TC.tc');
    }

    public function previewTc(){
        return view('TC.preview-tc');
    }
}
