<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showFormLogin()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ],[
            'email.required'=>'Vui lòng nhập email!',
            'email.email'=>'Email không hợp lệ!',
            'email.exists'=>'Email không tồn tại!',
            'password.required'=>'Vui lòng nhập mật khẩu!',
        ]);
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($data)) {
            if (Auth::user()->role === '1') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->back()->with([
                "message" => "Email hoặc mật khẩu không đúng"
            ]);
        }
        // $data = $request->all('email', 'password');
        // if (auth()->attempt($data)) {
        //     return redirect()->route('admin.dashboard');
        // }
        // return redirect()->back();
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.showFormLogin')->with([
            "message" => "Đăng xuất thành công!"
        ]);
    }
}
