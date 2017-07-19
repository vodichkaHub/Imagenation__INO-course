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

Route::get('account/{avatar?}', function ($avatar) {
    return view('auth.account', ['avatar' => $avatar]);
})->name('account');

Route::post('setAvatar', 'ImageController@setAvatar')->name('setAvatar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
