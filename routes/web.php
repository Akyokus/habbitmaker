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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('profile', 'ProfileController');
    Route::post('friend/{profile}', 'ProfileController@add_follow')->name('add_follow');
    Route::post('friend/unfollow/{profile}', 'ProfileController@unfollow')->name('unfollow');
    Route::get('followers/{profile}', 'FriendController@showFollowers')->name('followers');
    Route::get('followed/{profile}', 'FriendController@showFollowed')->name('followed');
});