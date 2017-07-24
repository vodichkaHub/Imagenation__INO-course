<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function users() {

        return hasOne(App\User);
    }   

    public function images() {

        return hasOne(App\Image);
    }
}
