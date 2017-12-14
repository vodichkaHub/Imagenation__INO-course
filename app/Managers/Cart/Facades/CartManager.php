<?php

namespace App\Managers\Cart\Facades;

use Illuminate\Support\Facades\Facade;

class CartManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Managers\Admin\CartManager::class;
    }
}
