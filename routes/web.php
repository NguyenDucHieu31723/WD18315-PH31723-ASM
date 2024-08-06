<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ForgotPassController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UpdatePassWordController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::prefix('auth')
    ->as('auth.')
    ->group(function () {
        Route::get('login', [LoginController::class, 'showFormLogin'])->name('showFormLogin');
        Route::post('login', [LoginController::class, 'login'])->name('login');

        Route::get('logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('register', [RegisterController::class, 'showFormRegister'])->name('showFormRegister');
        Route::post('register', [RegisterController::class, 'register'])->name('register');

        Route::get('forgotpass', [ForgotPassController::class, 'showFormForgotpass'])->name('showFormForgotpass');
        Route::post('forgotpass', [ForgotPassController::class, 'checkForgotPass'])->name('checkForgotPass');

        Route::get('update', [UpdatePassWordController::class, 'showFormUpdate'])->name('showFormUpdate');


    });

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/detail/{product_id}', [HomeController::class, 'detail'])->name('detail');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/products/{slug}', [HomeController::class, 'productInCategory'])->name('productInCategory');

Route::post('search', [DashboardController::class, 'search'])->name('search');

Route::prefix('admin')
    ->as('admin.')
    ->middleware('checkAdmin')
    ->group(function () {
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('profile', [ProfileController::class, 'showProfile'])->name('showProfile');
        Route::prefix('categories')
            ->as('categories.')
            ->group(function () {

                Route::get('list-categories', [CategoryController::class, 'listCategories'])->name('listCategories');
                Route::get('add-categories', [CategoryController::class, 'addCategories'])->name('addCategories');
                Route::post('store-categories', [CategoryController::class, 'storeCategories'])->name('storeCategories');
                Route::get('edit-categories/{category_id}', [CategoryController::class, 'editCategories'])->name('editCategories');
                Route::put('update-categories/{category_id}', [CategoryController::class, 'updateCategories'])->name('updateCategories');
                Route::get('show-categories/{category_id}', [CategoryController::class, 'showCategories'])->name('showCategories');
                Route::delete('destroy-categories/{category_id}', [CategoryController::class, 'destroyCategories'])->name('destroyCategories');
            });

        Route::prefix('products')
            ->as('products.')
            ->group(function () {

                Route::get('list-products', [ProductController::class, 'listProducts'])->name('listProducts');
                Route::get('add-products', [ProductController::class, 'addProducts'])->name('addProducts');
                Route::post('store-products', [ProductController::class, 'storeProducts'])->name('storeProducts');
                Route::get('edit-products/{product_id}', [ProductController::class, 'editProducts'])->name('editProducts');
                Route::put('update-products/{product_id}', [ProductController::class, 'updateProducts'])->name('updateProducts');
                Route::get('show-products/{product_id}', [ProductController::class, 'showProducts'])->name('showProducts');
                Route::delete('destroy-products/{product_id}', [ProductController::class, 'destroyProducts'])->name('destroyProducts');
            });

        Route::prefix('users')
            ->as('users.')
            ->group(function () {

                Route::get('list-users', [UserController::class, 'listUsers'])->name('listUsers');
                Route::get('add-users', [UserController::class, 'addUsers'])->name('addUsers');
                Route::post('store-Users', [UserController::class, 'storeUsers'])->name('storeUsers');
                Route::get('edit-users/{user_id}', [UserController::class, 'editUsers'])->name('editUsers');
                Route::put('update-users/{user_id}', [UserController::class, 'updateUsers'])->name('updateUsers');
                Route::get('show-users/{user_id}', [UserController::class, 'showUsers'])->name('showUsers');
                Route::delete('destroy-users/{user_id}', [UserController::class, 'destroyUsers'])->name('destroyUsers');
            });


    });





