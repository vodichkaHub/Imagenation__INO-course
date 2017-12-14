<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CartManger;
use App\Image;
use App\Cart;
use Auth;

class CartController extends Controller
{
    public function __construct() {

        $this->middleware('auth');
    }   

    /**
     * 
     * @return \Illuminate\View\View | \Illuminate\Contracts\View\Factory
     */
    public function show() {

        $cartList = CartManger::showCart();
        
        return view('cart', ['cartList' => $cartList]);
    }

    /**
     * 
     * @param Request $request
     */
    public function add(Request $request) {

        if ($request->ajax()) {
            $imageId = $request->input('image_id');
            $userId = Auth::user()->id;

            if (!CartManger::cartRowIsset($imageId, $userIds)) {
                Cart::addNewItem($imageId, $userId);
            }
            //NOTIFICATION
        }
    }


    public function buy($imageId) {
        $userId = Auth::user()->id;
        Cart::buy($imageId, $userId);

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
