<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AvatarController extends Controller
{

    public function __construct(Request $request) {

        $this->validate($request, [
            'ava' => 'required|image|dimensions:min_width=100,min_height_100,max_width:1000,max_height:1000'
        ]);
    }

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
            session(['Error' => 'Something went wrong']);
            return back()->withInput();
        }
    }
}
