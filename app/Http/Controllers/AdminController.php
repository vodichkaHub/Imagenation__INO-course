<?php

namespace App\Http\Controllers;

use AdminManager;
use App\User;
use Illuminate\Http\Request;
use ImageManager;

class AdminController extends Controller
{
 
    public function __construct () {

        $this->middleware('checkRole:administrator');
    }

    /**
     * 
     * @return \Illuminate\View\View | \Illuminate\Contracts\View\Factory
     */
    public function getAllUsers() {

        $users = AdminManager::getAllUsers();
        
        return view('admin-account', ['users' => $users]);
    }

    /**
     * 
     * @param int $id
     * @return \Illuminate\View\View | \Illuminate\Contracts\View\Factory
     */
    public function getAllWorksByAuthor($id) {
        
        $works = AdminManager::getAllWorksByUser($id);
        
        return view('admin-account', ['works' => $works]);
    }

    /**
     * 
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setBan($id) {

        User::setBan($id);
        
        return back();
    }

    /**
     * 
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unsetBan($id) {

        User::unsetBan($id);
        
        return back();
    }

    /**
     * 
     * @param int $image_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteImage($image_id) {
        
        ImageManager::deleteImage($image_id);

        return back();
    }    
}
