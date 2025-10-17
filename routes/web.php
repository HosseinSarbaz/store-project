<?php

use App\Http\Controllers\account\CategoryController;
use App\Http\Controllers\account\ProductController as ProductController;

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

 Route::get('/', function () {
     return view('Admin.index');
 });

Route::prefix('admin')->group(function() {

    Route::resource('categories',CategoryController::class);

    Route::resource('products',ProductController::class);

});



