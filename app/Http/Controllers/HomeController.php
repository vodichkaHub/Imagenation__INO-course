<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $names = $this->getAllNames();
        $path_array = $this->getAllWorks();
        return view('home', ['path_array' => $path_array, 'names' => $names]);
    }

    public function account() {

        $path_array = $this->getUserWorks(Auth::user()->id);
        return view('auth.account', ['path_array' => $path_array]);
    }

    protected function getAllNames() {
        return User::select('name', 'avatar', 'id', 'country')->get();
    }

    protected function getAllWorks() {

       return Image::select('path', 'user_id', 'name')->get();
    }

    protected function getUserWorks($id) {

        return Image::select('path')->where('user_id', $id)->get();
    }
}
