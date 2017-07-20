<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use App\Section;
use App\Image;
use Auth;

class ImageController extends Controller
{

    public function __construct() {
        
    }

    public function add(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'string|max:100',
            'width' => 'numeric|nullable',
            'height' => 'numeric|nullable',
            'image' => 'mimes:jpeg,jpg,jpe,tiff,png'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $fileName = $request->input('name') . '.' . $file->extension() ?: 'jpeg';
            $destination = public_path() . '/img/works/';
            $file->move($destination, $fileName);

            $section = Section::where('name', $request->input('section'))->first();

            $newImg = new Image;
            $newImg->name = $request->input('name');
            $newImg->path = $fileName;
            $newImg->width = $request->input('width');
            $newImg->height = $request->input('height');

            $newImg->user_id = Auth::user()->id;
            $newImg->section_id = $section->id;
            $newImg->save();

            session(['success' => 'Image successfuly added!']);
            return back()->withInput();
        }
        else {
            session(['Error' => 'Something went wrong, try another one']);
            return back()->withInput();
        }
    }
}