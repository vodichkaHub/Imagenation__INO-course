<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function users() {
        return $this->hasOne('App\User');
    }

    public function sections() {
        return $this->hasOne('App\Section');
    }    
}
