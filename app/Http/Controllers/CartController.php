<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Image;
use App\Cart;
use Auth;

class CartController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }   

    public function showCart() {

        $cartList = Cart::join('images', 'images.id', '=', 'carts.image_id')
                        ->select('images.path', 'images.width', 'images.height', 'images.name', 'images.price', 'carts.user_id', 'carts.image_id', 'paid')
                        ->where('carts.user_id', Auth::user()->id)
                        ->get();
        return view('cart', ['cartList' => $cartList]);
    }

    public function add(Request $request) {

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

    public function buy($imageId) {

        $userId = Auth::user()->id;
        $buy = Cart::where('user_id', $userId)
                    ->where('image_id', $imageId)
                    ->first();
        $buy->paid = 1;
        $buy->save();
        return back();
    }

    public function buyAll() {
        
        $userId = Auth::user()->id;
        $purchase = Cart::where('user_id', $userId)->get();
        foreach ($purchase as $buy) {
            $buy->paid = 1;
            $buy->save();
        }
        return back();
    }

    public function download($imageId) {

        $image = Image::select('path')->where('id', $imageId)->first();
        $path = public_path() . '/img/source/' . $image['path'];
        return response()->download($path);
    }
}
