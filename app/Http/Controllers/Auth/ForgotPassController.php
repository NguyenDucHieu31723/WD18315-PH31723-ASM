<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPassword;
use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ForgotPassController extends Controller
{
    public function showFormForgotpass()
    {
        return view('auth.send-mail');
    }
    public function checkForgotPass(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $customer = User::where('email', $request->email)->first();
        $token = \Str::random(40);
        $tokenData = [
            "email" => $request->email,
            "token" => $token,
        ];

        if (PasswordResetToken::create($tokenData)) {
            Mail::to($request->email)->send(new ForgotPassword($customer, $tokenData));
            return redirect()->back()->with(['message' => "Send mail successfully, please check email to continue"]);
        }
        return redirect()->back()->with(['message-error' => "Something error, please check again"]);
    }
}
