<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Image;

class AdminController extends Controller
{
    public function __constract () {
        $this->middleware('checkRole:administrator');
    }

    public function getAllUsers() {

        $users = User::select('id', 'name', 'login', 'country', 'avatar', 'ban')->get();

        return view('adminAccount', ['users' => $users]);
    }

    public function getAllWorksByAuthor($id) {

        $works = Image::join('sections', 'images.section_id', '=', 'sections.id')->select('images.id', 'images.name', 'width', 'height', 'sections.title')->where('images.user_id', $id)->get();    
        return view('adminAccount', ['works' => $works]);
    }

    public function setBan($id) {

        $user = User::where('id', $id)->first();
        $user->ban = 1;
        $user->save();
        return back();
    }

    public function unsetBan($id) {

        $user = User::where('id', $id)->first();
        $user->ban = 0;
        $user->save();
        return back();
    }

    public function deleteImage($image_id) {
        $path = Image::select('path')->where('id', $image_id)->first();
        Image::where('id', $image_id)->delete();

        unlink(public_path() . '/img/works/' . $path['path']);
        unlink(public_path() . '/img/source/' . $path['path']);
        return back();
    }    
}
