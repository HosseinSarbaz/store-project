<?php

use App\Http\Controllers\account\CategoryController;
use App\Http\Controllers\account\ProductController as ProductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\category;
use App\Models\Product;
use App\Models\test;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

//  Route::get('/', function () {
//      return view('Admin.index');
//  });

Route::middleware('admin')->group(function(){

    Route::prefix('admin')->group(function() {

        Route::resource('categories',CategoryController::class);

        Route::resource('products',ProductController::class);

        Route::view('/','Admin.index')->name('Admin.index');

        //مسیر های گالری عکس محصولات
        Route::get('products/{product}/AddImage',[ProductController::class,"addImage"])->name('Admin.Products.AddImage');
        Route::post('products/{product}/storeImage',[ProductController::class,"storeImage"])->name('Admin.Products.StoreImage');
        Route::get('products/{product}/productImages',[ProductController::class,"productImages"])->name('Admin.Products.ProductImages');
        Route::delete('products/{product}/deleteImage/{index}',[ProductController::class,"deleteImage"])->name('Admin.Products.deleteImage');

        // مسیر های رنگ محصولات
        Route::get('products/{product}/AddColor',[ProductController::class,"AddColor"])->name('Admin.Products.AddColor');
        Route::post('products/{product}/storeColor',[ProductController::class,"storeColor"])->name('Admin.Products.storeColor');
        Route::get('products/{product}/productColors',[ProductController::class,"productColors"])->name('Admin.Products.productColors');
        Route::delete('products/{product}/deleteColor/{name}',[ProductController::class,"deleteColor"])->name('Admin.Products.deleteColor');


        //مسیر های ویژگی های محصولات
        Route::get('products/{product}/AddAttribiute',[ProductController::class,"AddAttribiute"])->name('Admin.Products.AddAttribiute');
        Route::post('products/{product}/storeAttribiute',[ProductController::class,"storeAttribiute"])->name('Admin.Products.storeAttribiute');
        Route::get('products/{product}/Attribiutes',[ProductController::class,"Attribiutes"])->name('Admin.Product.Attribiutes');
        Route::delete('products/{product}/deleteAttribiute/{name}',[ProductController::class,"deleteAttribiute"])->name('Admin.Products.deleteAttribiute');

    });


});

    Route::namespace('Home')->group(function(){

        Route::get('/',[HomeController::class,"index"])->name('Home.index');

        Route::get('products',[HomeController::class,"products"])->name('Home.products');


        Route::get('category/{categoryslug}',[HomeController::class,"showCategory"])->name('Home.showCategory');

        Route::get('product/{productslug}',[HomeController::class,"showProduct"])->name('Home.showProduct');

        //سبد خرید
        Route::get('/cart/show',[CartController::class,"show"])->name('cart.show');
        Route::post('/cart/remove',[CartController::class,"remove"])->name('cart.remove');
        Route::post('/cart/add',[CartController::class,"add"])->name('cart.add');
        Route::patch('/cart/update/{id}',[CartController::class,"update"])->name('cart.update');

        // پروفایل کاربر
        Route::get('/profile',[ProfileController::class,"index"])->middleware('auth')->name('Home.Profile');


    });


    Route::prefix('Auth')->group(function(){

        Route::get('/registerForm',[AuthController::class,"registerForm"])->name('Auth.RegisterForm');
        Route::post('/register',[AuthController::class,"register"])->name('Auth.Register');
        Route::post('/login',[AuthController::class,"login"])->name('Auth.login');
        Route::post('/logout',[AuthController::class,"logout"])->name('Auth.logout');

    });




