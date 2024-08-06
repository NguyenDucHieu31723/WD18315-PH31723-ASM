<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCategoryRequest extends FormRequest
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
            'name' => 'required|string|unique:categories,name|max:255',
            'image' => 'required|image',
            'description' => 'required|string|max:1000',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên danh mục không được bỏ trống!',
            'image.required' => 'Hình ảnh không được bỏ trống!',
            'name.string' => 'Tên danh mục không đúng định dạng!',
            'name.unique' => 'Tên danh mục đã tồn tại!',
            'name.max' => 'Tên danh mục quá dài!',
            'image.image' => 'Hình ảnh không đúng định dạng!',
            'description.max' => 'Mô tả danh mục quá dài!',
            'description.required' => 'Mô tả danh mục không được bỏ trống!',
            'description.string' => 'Mô tả danh mục không đúng định dạng!',

            
        ];
    }
}
