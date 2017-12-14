<?php

namespace App\Managers\Cart;

use App\Cart;

class CartManager {

    /**
     * 
     * @return App\Cart
     */
    public function showCart() {

        $cartList = Cart::join('images', 'images.id', '=', 'carts.image_id')
                        ->select('images.path', 'images.width', 'images.height', 'images.name', 'images.price', 'carts.user_id', 'carts.image_id', 'paid')
                        ->where('carts.user_id', Auth::user()->id)
                        ->get();
        
        return $cartList;
    }
    
    public function add($request) {

        $imageId = $request->input('image_id');
        $user = Auth::user()->id;

        if (!$this->cartRowIsset($imageId, $user)) {

            $buy = new Cart;
            $buy->user_id = $user;
            $buy->image_id = $imageId;
            $buy->paid = 0;
            $buy->save();
        }
    }
    
    public function cartRowIsset($imageId, $id) {

        $check = Cart::select('user_id')->where('image_id', $imageId)->get();
        foreach ($check as $point) {
            if ($point->user_id == $id) {
                
                return true;
            }
            else {
                return false;
            }
        }
    }

}