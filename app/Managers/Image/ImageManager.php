<?php

namespace App\Managers\Image;

use App\Image;
use App\User;
use Storage;

class ImageManager {

    /**
     * 
     * @param type $image_id
     * @return type
     */
    public function deleteImage($imageId) {

        if (isset($imageId)) {
            $image = Image::where('id', $imageId)->first();

            $image->user->message = $image->user->message . "  |Your image with title " .  $image->name . ' was deleted by administrator';

            $image->delete();

            Storage::delete('images/works/' . $image->user->login . '/' . $image->name);
            Storage::delete('images/source/' . $image->user->login . '/' . $image->name);

            return true;
        }
    }  

}
