<?php

namespace App\Managers\Admin;
use App\User;
use App\Image;

class AdminManager {

    /**
     * 
     * @return App\User
     */
    public function getAllUsers() {

        $users = User::select('id', 'name', 'login', 'country', 'avatar', 'ban')->get();
        
        return $users;
    }
    
    /**
     * 
     * @param int $id
     * @return App\Image
     */
    public function getAllWorksByUser($id) {
        
        $user = User::where('id', $id)->first();
        $works = Image::where('user_id', $user->id)->get();
        
        return $works;
    }
}
