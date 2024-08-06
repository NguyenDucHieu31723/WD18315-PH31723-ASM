<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProductRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:products,name',
            'category_id' => 'required|exists:products,category_id',
            'image' => 'required|file|mimes:webp,png,jpg,svg',
            'description' => 'required|max:1000',
            'price' => 'required|numeric',
       
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "Tên sản phẩm không được để trống!",
            'name.string' => "Tên sản phẩm không đúng định dạng!",
            'name.max' => "Tên sản phẩm quá dài!",
            'name.unique' => "Tên sản phẩm đã tồn tại!",
            'category_id.required' => "Danh mục không được để trống!",
            'category_id.exists' => "Danh mục không tồn tại!",
            'image.required' => "Hình ảnh không được để trống!",
            'image.file' => "Hình ảnh không đúng định dạng!",
            'image.mimes' => "Hình ảnh không đúng định dạng!",
            'description.required' => "Mô tả không được để trống!",
            'description.max' => "Mô tả quá dài!",
            'price.required' => "Giá sản phẩm không được để trống!",
            'price.numeric' => "Giá sản phẩm không hợp lệ!",
            
        ];
    }
}

