<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function listProducts()
    {
        $products = Product::join('categories', 'products.category_id', '=', 'categories.category_id')
            ->orderBy('product_id', 'desc')
            ->select('products.product_id', 'products.name as product_name', 'products.image', 'products.description', 'products.created_at', 'products.updated_at', 'products.price', 'categories.name as category_name')
            ->paginate(5);
        return view('admin.products.list', compact('products'));
    }
    public function addProducts()
    {
        $category = Category::all();
        return view('admin.products.add', compact('category'));
    }
    public function storeProducts(Request $request)
    {
        $data = [
            'category_id' => $request->category,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ];
        $product = Product::create($data);
        $linkImage = "";
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $newNameImage = time() . '.' . $image->getClientOriginalExtension();
            $linkPublic = 'image-products/';
            $image->move(public_path($linkPublic), $newNameImage);

            $linkImage = $linkPublic . $newNameImage;
            $product->update(['image' => $linkImage]);
        }

        return redirect()->route('admin.products.listProducts')->with([
            'message' => 'Thêm mới sản phẩm thành công!',
        ]);
    }
    public function editProducts(Request $request)
    {
        $product = Product::find($request->product_id);
        $category = Category::all();
        return view('admin.products.edit', compact('product', 'category'));
    }
    public function updateProducts(Request $request)
    {
        $product = Product::where('product_id', $request->product_id)->first();
        $linkImage = $product->image;  //Giữ lại ảnh cũ
        if ($request->hasFile('image')) { // Kiểm tra xem request có gửi ảnh mới lên không
            File::delete(public_path($product->image)); // Nếu có thì xóa ảnh cũ
            $image = $request->file('image'); // Lấy file ảnh mới từ request
            $newNameImage = time() . '.' . $image->getClientOriginalExtension(); // Tạo tên mới cho ảnh
            $linkPublic = 'image-products/';  // Khai báo nơi lưu trữ ảnh
            $image->move(public_path($linkPublic), $newNameImage);  //Di chuyển file ảnh mới vào thư mục public với tên mới.

            $linkImage = $linkPublic . $newNameImage;  // Cập nhật đường dẫn ảnh mới
        }
        $data = [
            'name' => $request->name,
            'category_id' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $linkImage
        ];
        Product::where('product_id', $request->product_id)->update($data);
        return redirect()->route('admin.products.listProducts')->with([
            'message' => "Cập nhật sản phẩm thành công!"
        ]);
    }
    public function showProducts(Request $request)
    {
        $product = Product::with('category')->find($request->product_id);

        return view('admin.products.show', compact('product'));
    }
    public function destroyProducts(Request $request)
    {
        $product = Product::where('product_id', $request->product_id)->first();
        if ($product->image != null && $product->image != '') {
            File::delete(public_path($product->image));
        }
        Product::where('product_id', $request->product_id)->delete();
        return redirect()->route('admin.products.listProducts')->with([
            'message' => "Bạn đã xóa thành công!"
        ]);
    }

}
