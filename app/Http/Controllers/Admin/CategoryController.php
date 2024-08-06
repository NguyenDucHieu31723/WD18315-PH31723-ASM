<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function listCategories()
    {
        $listCat = Category::orderBy('category_id', 'desc')->paginate(5);
        return view('admin.categories.list', compact('listCat'));
    }
    public function addCategories()
    {
        return view('admin.categories.add');
    }
    public function storeCategories(AdminCategoryRequest $request)
    {
        $linkImg = "";
        $data = [
            'name' => $request->name,
            'description' => $request->description
        ];
 
        $category = Category::create($data);

        if ($request->hasFile('image')) {// Kiểm tra xem request có chứa file ảnh mới không
            $image = $request->file('image');  // Lấy file ảnh mới từ request 
            $newNameImg = time() . '.' . $image->getClientOriginalExtension(); // Tạo tên mới cho file ảnh
            $linkStorage = 'image-categories/'; // Tạo đường dẫn cho file ảnh
            $image->move(public_path($linkStorage), $newNameImg); // Di chuyển file ảnh đến thư mục

            $linkImg = $linkStorage . $newNameImg;
            $category->update(['image' => $linkImg]);
        }

        return redirect()->route('admin.categories.listCategories')->with([
            'message' => "Thêm mới danh mục thành công"
        ]);
    }
    public function editCategories(Request $request)
    {
        $category = Category::find($request->category_id);
        return view('admin.categories.edit', compact('category'));
    }
    public function updateCategories(AdminCategoryRequest $request)
    {

        $category = Category::where('category_id', $request->category_id)->first();
        $linkImg = $category->image; // Giữ lại ảnh cũ
        if ($request->hasFile('image')) {   // Kiểm tra xem request có chứa file ảnh mới không
            File::delete(public_path($category->image)); // Nếu có file ảnh mới, xóa ảnh cũ khỏi thư mục public
            $image = $request->file('image');  // Lấy file ảnh mới từ request 
            $newNameImage = time() . '.' . $image->getClientOriginalExtension();  //Tạo tên mới cho ảnh
            $linkStorage = 'image-categories/';  //Đặt đường dẫn thư mục lưu trữ ảnh
            $image->move(public_path($linkStorage), $newNameImage);   //Di chuyển file ảnh mới vào thư mục public với tên mới.

            $linkImg = $linkStorage . $newNameImage;  //Cập nhật đường dẫn ảnh mới 
        }
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'image' => $linkImg,
        ];
        Category::where('category_id', $request->category_id)->update($data);

        return redirect()->route('admin.categories.listCategories')->with([
            'message' => "Cập nhật danh mục thành công"
        ]);
    }
    public function showCategories(Request $request)
    {
        $category = Category::find($request->category_id);
        return view('admin.categories.show', compact('category'));
    }
    public function destroyCategories(Request $request)
    {
        $category = Category::where('category_id', $request->category_id)->first();
        if ($category->image != null && $category->image != '') {
            File::delete(public_path($category->image));
        }
        Category::where('category_id', $request->category_id)->delete();
        return redirect()->back()->with([
            "message" => "Xóa danh mục thành công!"
        ]);

    }
}
