<?php

namespace App\Managers\Image\Facades;

use Illuminate\Support\Facades\Facade;

class ImageManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Managers\Admin\ImageManager::class;
    }
}
