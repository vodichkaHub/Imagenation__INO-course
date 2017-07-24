<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
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
            'height' => 'same:width',
            'image' => 'image'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $image = getimagesize($file);
            $fileName = $request->input('name') . '.' . $file->extension() ?: 'jpeg';
            $WMdestination = public_path() . '/img/works/';
            $destination = public_path() . '/img/source/';
            $file->move($destination, $fileName);

            $this->setWaterMark($destination . $fileName, $WMdestination . $fileName);

            $section = Section::where('title', $request->input('section'))->first();

            $newImg = new Image;
            $newImg->name = $request->input('name');
            $newImg->path = $fileName;
            $newImg->width = $image['0'];
            $newImg->height = $image['1'];
            $newImg->price = $request->input('price');

            $newImg->user_id = Auth::user()->id;
            $newImg->section_id = $section->id;
            $newImg->save();

            $request->session()->flash('success', 'Image successfuly added!');
            return back()->withInput();
        }
        else {
            $request->session()->flash('Error', 'Has no file, try another one');
            return back()->withInput();
        }
    }

    protected function setWaterMark($path, $WMdestination) {

        $im = imagecreatefromjpeg($path);
        $stamp = imagecreatefrompng(public_path() . '/img/WMImagenation.png');

        $marge_right = 50;
        $marge_bottom = 59;
        $sx = imagesx($stamp);
        $sy = imagesy($stamp);

        for ($i = 0; $i<3; $i++) {
            imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));
            $marge_bottom += 300;
            $marge_right += 400;
        }

        imagejpeg($im, $WMdestination);
        imagedestroy($im);
    }

    public function showImage ($imageId) {

        $path = Image::select('path')->where('id', $imageId)->first();
        $redirect = 'img/works/' . $path['path'];
        return redirect($redirect);
    }
}