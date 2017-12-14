<?php

namespace App\Managers\Avatar\Facades;

use Illuminate\Support\Facades\Facade;

class AvatarManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Managers\Avatar\AvatarManager::class;
    }
}
