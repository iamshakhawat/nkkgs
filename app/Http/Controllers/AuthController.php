<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\Students;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function loginPost(LoginRequest $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $request->authenticate();
        $request->session()->regenerate();

        $url = '';
        if(Auth::user()->role == 'admin'){
            $url = '/admin/dashboard';
        }
        else if(Auth::user()->role == 'teacher'){
            $url = '/teacher/dashboard';
        }
        else if(Auth::user()->role == 'gurdian'){
            $url = '/gurdian/dashboard';
        }
        else{
            $url = '/student/dashboard';
        }
        
        $email = Auth::user()->email;
        DB::table('users')->where('email',"$email")->update([
            'status' => 1,
        ]);

        return redirect()->intended($url);

    }
}
