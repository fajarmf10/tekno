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

// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('/chat', function() {
// 	return view('chat.index');
// });

// Route::get('/profile', function() {
// 	return view('profile.index');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function(){
	return redirect()->route('home');
});
Route::resource('/chat', 'ChatsController');

// User Things
Route::get('/profile', 'ProfileController@showProfile')->name('showProfile');
Route::get('/upgrade', 'ProfileController@upgrade')->name('upgradeProfile');
Route::post('/upgrade', 'ProfileController@upgrade');
Route::patch('/profile/{user}/update', ['as' => 'updateProfile', 'uses' => 'ProfileController@update']);

// Profile printing only
Route::resource('/printing', 'ProfileController');

Route::get('messages', 'ChatsController@fetchMessages');
Route::post('messages', 'ChatsController@sendMessage');
Route::resource('/order', 'OrderController');
