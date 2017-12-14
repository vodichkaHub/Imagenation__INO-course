<?php

namespace App\Managers\Admin\Facades;

use Illuminate\Support\Facades\Facade;

class AdminManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Managers\Admin\AdminManager::class;
    }
}
