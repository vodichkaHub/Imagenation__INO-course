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

Route::prefix('admin')->group(function() {

    Route::get('account', 'AdminController@getAllUsers')->name('admin');

    Route::get('works/{id}', 'AdminController@getAllWorksByAuthor')->name('listOfWorks');

    Route::get('setBan/{id}', 'AdminController@setBan')->name('setBan');

    Route::get('unsetBan/{id}', 'AdminController@unsetBan')->name('unsetBan');

    Route::get('deleteImg/{image_id}', 'AdminController@deleteImage')->name('deleteImg');
});

Route::prefix('image')->group(function() {

    Route::post('add', 'ImageController@add')->name('add');

    Route::get('uploadPage', 'ImageController@handler');
});

Route::get('ex', function () {
$path = App\Image::select('path')->where('id', 23)->first();
return var_dump($path['path']);
})->name('ex');