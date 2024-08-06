<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard.dashboards');
    }
    public function search(Request $request)
    {

        $keySearch = $request->search;
        $products = Product::where('name', 'like', "%$keySearch%")
            ->get();
        // $categories = Category::where('description', 'like', "%$keySearch%")
        //     ->get();
        $users = User::where('full_name', 'like', "%$keySearch%")
            ->get();
        return view('admin.search', compact('products', 'users'));
    }
}
