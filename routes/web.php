<?php
use Illuminate\Http\Request;
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

Auth::routes();

Route::get('account', 'HomeController@account')->middleware('auth')->name('account');

Route::get('hideMessage', 'HomeController@hideMessage')->name('hideMessage');

Route::post('setAvatar', 'AvatarController@setAvatar')->middleware('auth')->name('setAvatar');

Route::get('home', 'HomeController@index')->name('home');

Route::post('select', 'HomeController@selectBy')->name('selectBy');

Route::prefix('admin')->group(function() {

    Route::get('account', 'AdminController@getAllUsers')->name('admin');

    Route::get('works/{id}', 'AdminController@getAllWorksByAuthor')->name('listOfWorks');

    Route::get('setBan/{id}', 'AdminController@setBan')->name('setBan');

    Route::get('unsetBan/{id}', 'AdminController@unsetBan')->name('unsetBan');

    Route::get('deleteImg/{image_id}', 'AdminController@deleteImage')->name('deleteImg');
});

Route::prefix('cart')->group(function() {

    Route::get('show', 'CartController@showCart')->name('showCart');

    Route::get('add/{imageId}', 'CartController@add')->name('addToCart');

    Route::get('buy/{imageId}', 'CartController@buy')->name('buy');

    Route::get('download/{imageId}', 'CartController@download')->name('download');
});

Route::prefix('image')->group(function() {

    Route::post('add', 'ImageController@add')->name('add');

    Route::get('show/{imageId}', 'ImageController@showImage')->name('showImage');
});

Route::any('ex', function (Request $request) {
return $request->input('section');

})->name('ex');