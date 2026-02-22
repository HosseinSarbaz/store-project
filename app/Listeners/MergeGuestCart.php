<?php

namespace App\Listeners;


use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Session;


class MergeGuestCart
{

    public function handle(login $event)
    {
        $user = $event->user;

        $guestCart = session()->get('cart',[
            'items' => [],
            'total_quantity' => 0,
            'total_price' => 0
        ]);

        if (empty($guestCart['items'])){
            return;
        }

        $userCart = $user->cart ?? [
            'items' => [],
            'total_quantity' => 0,
            'total_price' => 0
        ];

        $mergedCart = $this->mergeCarts($userCart,$guestCart);
        $user->cart = $mergedCart;
        $user->save();

        session()->forget('cart');

    }


    private function mergeCarts($userCart,$guestCart)
    {
        $mergeItems = [];

        if(!empty($userCart['items'])){
            foreach($userCart['items'] as $key => $item ){
                $mergeItems[$key] = $item;
            }
        }


        if(!empty($guestCart['items'])){
            foreach($guestCart['items'] as $key => $guestItem){

                if(isset($mergeItems[$key])){
                    $mergeItems[$key]['quantity'] += $guestItem['quantity'];
                }

                else{
                    $mergeItems[$key] = $guestItem;
                }
            }
        }


        $total_quantity = 0;
        $total_price = 0;

        foreach($mergeItems as $item){
            $total_quantity += $item['quantity'];
            $total_price += $item['quantity'] * $item['price'];
        }

        return [
            'items' => $mergeItems,
            'total_quantity' => $total_quantity,
            'total_price' => $total_price
        ];

    }
}
