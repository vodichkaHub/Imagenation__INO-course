<?php

namespace App\Managers\Avatar;

use Storage;
use App\User;
use Auth;

class AvatarManager {

    /**
     * 
     * @param file $file
     * @return boolean
     */
    public function setAvatar ($file) {

        if (isset($file)) {
            
            Storage::put('images/avatars/', $file);

            $user = User::where('id', Auth::user()->id)->first();
            $user->avatar = Storage::url('images/avatars/', $file);
            $user->save();
            
            return true;
        } else {
            //LOGS================
            return false;
        }
    }

}
