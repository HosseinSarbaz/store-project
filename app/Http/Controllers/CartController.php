<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function show(){
        $cart = session()->get('cart',[]);
        $total = 0;
        foreach($cart as $item)
        {
            $total += ($item['price'] ?? 0) * ($item['quantity'] ?? 0);
        }
        return view('Home.cart',compact("cart","total"));
    }




    public function add(Request $request){

        $request->validate([
            'product_id' => 'required|string|exists:products,_id',

        ]);

        $product = Product::find($request->product_id);
        if(! $product){
            return back()->with('Error','محصول یافت نشد');
        }

        $colorName = "نامشخص";
        if(!empty($product->colors)){
        $colorName = array_search($request->color,$product->colors) ?: "نامشخص";
        }

        $colorkey = $request->color ?: null;
        $id = $product->getKey() . '-' . $colorName;

       $cart = session()->get('cart',[]);


        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }
        else{

            if(is_array($product->images) && count($product->images) > 0){
                $image = is_array($product->images[0])
                ? $product->images[0][0]
                : $product->images[0];
            }

            $colorName = "نامشخص";
            if(!empty($product->colors)){
                $colorName = array_search($request->color,$product->colors) ?: "نامشخص";
            }


            $cart[$id] = [
                'id' => $id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $image,
                'color' => $request->color,
                'color_name' => $colorName,
                'quantity' => 1 ];
        }


        session()->put('cart',$cart);



        return  redirect()
        ->route('cart.show')
        ->with('Success','محصول به سبد خرید شما اضافه شد') ;

    }

    public function remove(Request $request){
        $cart = session()->get('cart',[]);

        if(isset($cart[$request->id])){
            unset($cart[$request->id]);
        }
        session()->put('cart',$cart);

        return redirect()->route('cart.show')->with('Success','محصول از سبد خرید حذف شد');
    }


    public function update(Request $request,$id){


        $cart = session()->get('cart',[]);
        if(isset($cart[$id])){
            if($request->action === 'increase'){
                $cart[$id]['quantity'] ++ ;
            }
            elseif($request->action === 'decrease'){
                $cart[$id]['quantity'] -- ;
            }
            if($cart[$id]['quantity'] <= 0){
                unset($cart[$id]);
            }
        }
        session()->put('cart',$cart);
        // dd("ok");

        return redirect()->route('cart.show');
    }
}



