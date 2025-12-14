<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{


    private function getcart(){
        return session()->get('cart',[
            'items' => [],
            'total_quantity' =>0,
            'total_price' =>0
        ]);
    }

    private function savecart($cart){
        session()->put('cart',$cart);
    }


    private function calculateTotals(&$cart){
        $cart['total_quantity'] = 0;
        $cart['total_price'] = 0;

        foreach($cart['items'] as $item){
            $cart['total_quantity'] += $item['quantity'];
            $cart['total_price'] += $item['quantity'] * $item['price'] ;
        }
    }


    public function show(){
        $cart = $this->getcart();
        $this->calculateTotals($cart);

        return view('Home.cart',compact("cart"));
    }




    public function add(Request $request){

        $request->validate([
            'product_id' => 'required|string|exists:products,_id',

        ]);

        $product = Product::find($request->product_id);
        if(! $product){
            return back()->with('Error','محصول یافت نشد');
        }

        $cart = $this->getcart();

        $colorName = "نامشخص";
        if(!empty($product->colors)){
        $colorName = array_search($request->color,$product->colors) ?: "نامشخص";
        }

        $colorkey = $request->color ?: null;
        $id = $product->getKey() . '-' . $colorName;




        if(isset($cart['items'][$id])){
            $cart['items'][$id]['quantity']++;
        }
        else{

            if(is_array($product->images) && count($product->images) > 0){
                $image = is_array($product->images[0])
                ? $product->images[0][0]
                : $product->images[0];
            }


            $cart['items'][$id] = [
                'id' => $id,
                'product_id' => (string)$product->getkey(),
                'name' => $product->name,
                'price' => $product->price,
                'total_price' => $product->price,
                'image' => $image,
                'color' => $colorkey,
                'color_name' => $colorName,
                'quantity' => 1 ];
        }


        $this->calculateTotals($cart);
        $this->savecart($cart);



        return  redirect()
        ->route('cart.show')
        ->with('Success','محصول به سبد خرید شما اضافه شد') ;

    }

    public function remove(Request $request){
        $cart = $this->getcart();

        if(isset($cart['items'][$request->id])){
            unset($cart['items'][$request->id]);
        }

        $this->calculateTotals($cart);
        $this->savecart($cart);

        return redirect()->route('cart.show')->with('Success','محصول از سبد خرید حذف شد');
    }


    public function update(Request $request,$id){


        $cart = $this->getcart();

        if(isset($cart['items'][$id])){
            if($request->action === 'increase'){
                $cart['items'][$id]['quantity'] ++ ;
            }
            elseif($request->action === 'decrease'){
                $cart['items'][$id]['quantity'] -- ;
            }
            if($cart['items'][$id]['quantity'] <= 0){
                unset($cart['items'][$id]);
            }
        }

        $this->calculateTotals($cart);
        $this->savecart($cart);



        return redirect()->route('cart.show');
    }
}



