<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Homepage extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function login(){
        return view('backend.login');
    }

}
