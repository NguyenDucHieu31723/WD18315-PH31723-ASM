<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showFormRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirmPassword' => 'required|same:password',
        ],[
            'full_name.required'=>'Vui lòng nhập họ tên!',
            'email.required'=>'Vui lòng nhập email!',
            'email.email'=>'Email không hợp lệ',
            'email.unique'=>'Email đã tồn tại!',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'confirmPassword.required'=>'Vui lòng nhập mật khẩu',
            'confirmPassword.same'=>'Mật khẩu không khớp!',
        ]);
        $check = User::where('email', $request->email)->exists();
        if (!$check) {
            if ($request->password === $request->confirmPassword) {
                $data = [
                    'full_name' => $request->full_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ];
                User::create($data);
                return redirect()->route('auth.showFormLogin')->with(["message" => "Đăng kí thành công!"]);
            }
            return redirect()->back();

        } else {
            return redirect()->back();
        }
        // $data = $request->all('full_name', 'email', 'address', 'phone');
        // $data['password'] = bcrypt($request->password);
        // User::create($data);
        // return redirect()->route('admin.showFormLogin');
    }
}
