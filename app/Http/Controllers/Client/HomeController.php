<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $listProducts = Product::orderByDesc('product_id')->limit(8)->get();
        $firstProduct = Product::orderByDesc('product_id')->first();
        return view('client.home', compact('listProducts', 'firstProduct'));
    }
    public function shop()
    {
        $listProducts = Product::orderByDesc('product_id')->paginate(6);
        return view('client.shop', compact('listProducts'));
    }
    public function detail(Request $request)
    {
        $productDetail = Product::where('product_id', $request->product_id)->first();
        return view('client.detail', compact('productDetail'));
    }
    public function contact()
    {
        return view('client.contact');
    }
    public function checkout()
    {
        return view('client.checkout');
    }
    public function cart()
    {
        return view('client.cart');
    }
    public function blog()
    {
        return view('client.blog');
    }
    public function productInCategory($slug)
    {
        $category = Category::where('name', $slug)->first();
        $product = Product::where('category_id', $category->category_id)->paginate(6);
   
        return view('client.product-in-category', compact('product'));
    }
    public function about()
    {
        return view('client.about-us');
    }
}
