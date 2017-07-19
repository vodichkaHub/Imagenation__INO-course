<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class ImageController extends Controller
{
    public function setAvatar (Request $request) {

        if ($request->hasFile('ava')) {

            $file = $request->file('ava');
            $fileName  = Auth::user()->id . '.' . 'jpeg'; 
            $destination = public_path() . '/img/avatars';
            $file->move($destination, $fileName);
            
            $user = User::where('id', Auth::user()->id)->first();
            $user->avatar = $fileName;
            $user->save();
            return redirect()->route('account');
        }
        else {
            return back()->withErrors(['incorrect data']);
        }
    }

    public function getAvatar ($id) {
       return User::select('avatar')->where('id', $id)->first();
    }


}