<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AvatarManager;

class AvatarController extends Controller
{

    public function __construct(Request $request) {

        $this->validate($request, [
            'ava' => 'required|image|dimensions:min_width=100,min_height_100,max_width:1000,max_height:1000'
        ]);
    }

    public function setAvatar (Request $request) {

        if ($request->hasFile('ava')) {
            if (AvatarManager::setAvatar($request->file('ava'))) {
                
                return back();
            }
        }
        
        return back()->with('Error', 'Something went wrong');
    }
}
