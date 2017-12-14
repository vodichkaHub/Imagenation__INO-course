<?php

namespace App\Managers\Home\Facades;

use Illuminate\Support\Facades\Facade;

class HomeManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Managers\Admin\HomeManager::class;
    }
}
