<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Image;
use App\User;
use App\Section;
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
            $pathArray = $this->getAllWorks();
            $revPathArray = $pathArray->reverse();
            $revPathArray->all();
            return view('home', ['pathArray' => $revPathArray, 'names' => $names]);
    }

    public function account() {

        $message = User::select('message')->where('id', Auth::user()->id)->first();

        if (empty($message)) {

            $pathArray = $this->getUserWorks(Auth::user()->id);
            $pathArray->all();
            return view('auth.account', ['pathArray' => $pathArray]);
        }
        else {
            $pathArray = $this->getUserWorks(Auth::user()->id);
            return view('auth.account', [
                'pathArray' => $pathArray,
                'message' => $message['message'],
            ]);
        }
    }

    protected function getAllNames() {

        return User::select('name', 'avatar', 'id', 'country')->get();
    }

    protected function getAllWorks() {

       return Image::select('id', 'path', 'user_id', 'name', 'price')->get();
    }

    protected function getUserWorks($id) {

        return Image::select('path', 'id')->where('user_id', $id)->get();
    }

    public function hideMessage() {

        $user = User::where('id', Auth::user()->id)->first();
        $user['message'] = null;
        $user->save();
        return back();
    }

    public function selectBy(Request $request) {

        $pathArray = null;
        $namess = $this->getAllNames();
        $section = $request->input('section');
        $width = (int)$request->input('width');

        if ($section != 'Section') { //не пусто в post 

            if ($width != 'Width') { //не пусто в post

                $widthPathArray = $this->selectByWidth($request, $width);
                $sectionPathArray = $this->selectBySection($request, $section);

                // заданы и секция и ширина
                if (!$widthPathArray || !$sectionPathArray) { //нет результата
                        
                    return back()->withInput();
                }
                else {
                    $matches = $this->findMatches($request, $sectionPathArray, $widthPathArray);
                    if (!$matches) {

                        return back()->withInput();
                    }

                    $info = $this->findInfoByPath($matches);
                    return view('home', ['info' => $info]);
                }
            }
            else { // задана только секция
                if (!$this->selectBySection($request, $section)) { //нет результата

                    return back()->withInput();
                }
                else {
                    $pathArray = $this->selectBySection($request, $section);
                    return view('home', ['pathArray' => $pathArray, 'names' => $namess]);
                }
            } 
        }
        else { //задана только ширина
            if ($width != 'Width') {

                $width = (int)$request->input('width');

                if (!$this->selectByWidth($request, $width)) { //нет результата
                        
                    return back()->withInput();
                }
                else {
                    $pathArray = $this->selectByWidth($request, $width);
                    return view('home', ['pathArray' => $pathArray, 'names' => $namess]);
                }
            }
        }
    }

    public function selectBySection($request, $section) {

        $pathArray = Image::join('sections', 'sections.id', '=', 'section_id')->select('images.id', 'path', 'user_id', 'price')->where('title', $section)->get();
        
        if (!$pathArray->isEmpty()) {

            $revPathArray = $pathArray->reverse();
            $revPathArray->all();
            return $revPathArray;
        }
        else {
            $request->session()->flash('info', 'No matches');
            return false;
        }
    }

    public function selectByWidth($request, $width) {

        $pathArray = Image::join('sections', 'sections.id', '=', 'section_id')->select('images.id', 'path', 'user_id', 'price')->where('width', '>', $width)->get();
            
        if (!$pathArray->isEmpty()) {

            $revPathArray = $pathArray->reverse();
            $revPathArray->all();
            return $revPathArray;
        }
        else {
            $request->session()->flash('info', 'No matches');
            return false;
        } 
    }

    protected function findMatches($request, $sectionPathArray, $widthPathArray) {

        $matches;
        foreach ($sectionPathArray as $sectionPath) {
            foreach ($widthPathArray as $widthPath) {
                if ($widthPath['path'] == $sectionPath['path']) {

                    $matches [] = $widthPath['path'];
                }
            }
        }
        if (!empty($matches)) {
            
            return $matches;
        }
        else {
            $request->session()->flash('info', 'No matches');
            return false;
        }
    }

    protected function findInfoByPath($array) {

        $info;

        foreach ($array as $point) {
            $info [] = User::join('images', 'user_id', '=', 'users.id')
                            ->select('user_id', 'users.avatar', 'users.name', 'users.country', 'images.id', 'images.name', 'images.price', 'path')
                            ->where('path', $point)
                            ->first();
        }

        return $info;
    }
}
