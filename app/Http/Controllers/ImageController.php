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
            $fileName  = session('id') . '.' . $file->extension() ?: 'jpg'; 
            $destination = public_path() . '/img/avatars';
            $file->move($destination, $fileName);
            
            Auth::user()->update(['avatar' => $fileName]);
            return redirect()->route('account', ['avatar' => $fileName]);
        }
        else {
            return back()->withErrors(['incorrect data']);
        }
    }


}