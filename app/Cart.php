<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function users() {

        return hasOne('App\User', 'user_id');
    }   

    public function images() {

        return hasOne('App\Image', 'image_id');
    }

    public static function addNewItem() {
        $buy = new Cart;
        $buy->user_id = $user;
        $buy->image_id = $imageId;
        $buy->paid = 0;
        $buy->save();
    }
    
    public static function buy($imageId, $userId) {
        $buy = Cart::where('user_id', $userId)
                    ->where('image_id', $imageId)
                    ->first();
        $buy->paid = 1;
        $buy->save();
    }
}
