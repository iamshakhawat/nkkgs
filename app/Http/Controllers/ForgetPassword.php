<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\User;
use App\Mail\ForgetPassword as ForgetPasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgetPassword extends Controller
{
    
    public function forgetPassword()
    {
        return view('backend.forget-password');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $checkEmail = User::where('email', $request->email)->get();

        if (sizeof($checkEmail) == 0) {
            return redirect()->back()->withIcon('error')->withMessege("'$request->email' is not exist!");
        } else {

            $token = md5(uniqid());
            $user = DB::table('users')->where('email', $request->email)->get();
            $name = $user[0]->fname . ' ' . $user[0]->lname;
            $url = request()->getSchemeAndHttpHost() . "/verify?token=$token";

            $maildata = [
                'name' => $name,
                'url' => $url,
            ];

            if (Mail::to($request->email)->send(new ForgetPasswordReset($maildata))) {

                date_default_timezone_set('Asia/Dhaka');
                DB::table('users')->where('email', $request->email)->update([
                    'remember_token' => $token,
                    'email_verified_at' => date('Y-m-d H:i:s'),
                ]);
                return redirect()->back()->withIcon('success')->withMessege("Check your Mail");
            } else {
                return redirect()->back()->withIcon('error')->withMessege("Something went wrong!");
            }
        }
    }


    public function verifyEmail(Request $request)
    {
        date_default_timezone_set('Asia/Dhaka');
        $token = $request->token;
        $dbdata = User::where('remember_token', $token)->get();

        try {
            $id = $dbdata[0]->id;
            $dbtoken = $dbdata[0]->remember_token;
            $email_verified_at = $dbdata[0]->email_verified_at;
            $dbverifytime = new DateTime($email_verified_at);
            $resetTime = $dbverifytime->getTimestamp();
            $currentTime = time() - 300; // After 300 second this link will be expired
        } catch (\Throwable $th) {
            return view('backend.template.invalid-token');
        }

        if ($resetTime >= $currentTime) {
            if ($dbtoken === $token) {
                return view('backend.new-password', compact('id'));
            } else {
                return view('backend.template.invalid-token');
            }
        } else {
            return view('backend.template.expired-token');
        }
    }

    public function setNewPassword(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'new_password' => 'required|min:6|same:confirm_password',
            'confirm_password' => 'required|min:6'
        ]);
        DB::table('users')->where('id', $request->id)->update([
            'password' => Hash::make($request->new_password),
        ]);
        return redirect()->route('login')->withIcon('success')->withMessege('Password Change Successfully!');
    }
}
