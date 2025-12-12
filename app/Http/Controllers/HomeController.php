<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use MongoDB\BSON\ObjectId;


class HomeController extends Controller
{

    public function showProduct($productslug){
        $product = Product::where('productslug',$productslug)->firstOrFail();
        $product->load('category');
        return view("Home.showProduct",compact("product"));

    }

    public function index(){
        $category = Category::all();
        $products = Product::latest()->take(8)->get();
        return view("Home.index",compact("products","category"));
    }


    public function products(){
        $products = Product::latest()->take(8)->get();
        return view("Home.products",compact("products"));
    }

    public function showCategory($categoryslug){
        $category = Category::where('categoryslug',$categoryslug)->firstOrFail();
        // $products = Product::where('category_id',$category->_id)->get();
        $products = Product::where('category_id', new \MongoDB\BSON\ObjectId($category->_id))->get();

        return view("Home.products" , compact("category", "products" ));
    }

}
