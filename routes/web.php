<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('account', 'HomeController@account')->middleware('auth')->name('account');

Route::post('setAvatar', 'AvatarController@setAvatar')->middleware('auth')->name('setAvatar');

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::prefix('image')->group(function() {

    Route::post('add', 'ImageController@add')->name('add');
});

Route::get('ex', function () {
$path_array = App\Image::select('path')->users()->select('name')->get();
foreach($path_array as $path) {
    echo $path;
}
})->name('ex');