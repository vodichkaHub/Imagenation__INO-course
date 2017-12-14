<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function users() {
        return $this->hasOne('App\User', 'user_id');
    }

    public function sections() {
        return $this->hasOne('App\Section', 'section_id');
    }    
}
