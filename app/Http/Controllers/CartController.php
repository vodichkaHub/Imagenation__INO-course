<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Image;
use App\Cart;
use Auth;

class CartController extends Controller
{
    public function __consruct() {

        $this->middleware('guest');
    }

    public function showCart() {

        $cartList = Cart::join('images', 'images.id', '=', 'carts.image_id')
                        ->select('images.path', 'images.width', 'images.height', 'images.name', 'images.price', 'carts.user_id', 'carts.image_id', 'paid')
                        ->get();
        return view('cart', ['cartList' => $cartList]);
    }

    public function add($imageId) {

        $user = Auth::user()->id;
        $buy = new Cart;
        $buy->user_id = $user;
        $buy->image_id = $imageId;
        $buy->paid = 0;
        $buy->save();

        return back();
    }

    public function buy($imageId) {

        $userId = Auth::user()->id;
        $buy = Cart::where('user_id', $userId)
                    ->where('image_id', $imageId)
                    ->first();
        $buy->paid = 1;
        $buy->save();

        return back();
    }

    public function download($imageId) {

        $image = Image::select('path')->where('id', $imageId)->first();
        $path = public_path() . '/img/source/' . $image['path'];
        return response()->download($path);
    }
}
