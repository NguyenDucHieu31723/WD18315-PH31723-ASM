<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'image' => 'required|file|mimes:webp,png,jpg,svg',
            'phone' => 'required|unique:users,phone',
            'address' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'role' => 'nullable',
        ];
    }
    public function messages(): array
    {
        return [
            'full_name.required' => 'Tên người dùng không được bỏ trống!',
            'full_name.string' => 'Tên người dùng không hợp lệ!',
            'full_name.max' => 'Tên người dùng quá dài!',
            'email.required' => 'Email người dùng không được bỏ trống!',
            'email.email' => 'Email người dùng không hợp lệ!',
            'email.unique' => 'Tên người dùng đã tồn tại!',
            'image.required' => 'Hình ảnh không được bỏ trống',
            'image.file' => 'Hình ảnh không hợp lệ!',
            'image.mimes' => 'Hình ảnh không hợp lệ!',
            'phone.required' => 'Số điện thoại không được bỏ trống!',
            'phone.unique' => 'Số điện thoại đã tồn tại!',
            'address.required' => 'Địa chỉ không được bỏ trống!',  
            'password.required' => "Mật khẩu không được bỏ trống!",
            'confirm_password.required' => "Mật khẩu không được bỏ trống!",
            'confirm_password.same' => "Mật khẩu không khớp!",
        ];
    }
}
