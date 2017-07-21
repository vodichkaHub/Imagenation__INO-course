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
            'name' => 'alpha|string|max:100|unique:images,name',
            'width' => 'numeric|nullable',
            'height' => 'numeric|nullable',
            'image' => 'image'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $fileName = $request->input('name') . '.' . $file->extension() ?: 'jpeg';
            $WMdestination = public_path() . '/img/works/';
            $destination = public_path() . '/img/source/';
            $file->move($destination, $fileName);

            $this->setWaterMark($destination . $fileName);

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

    protected function setWaterMark($path) {

        $im = imagecreatefromjpeg($path);
        $stamp = imagecreatefrompng(public_path() . '/img/TRlogo-waterMark.png');

        $marge_right = 10;
        $marge_bottom = 10;
        $sx = imagesx($stamp);
        $sy = imagesy($stamp);

        imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

        imagejpeg($im, $path);
        imagedestroy($im);
    } 
}