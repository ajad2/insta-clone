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


Route::get('/home', function () {
    return redirect()->route('profile', [auth()->user()->id]);
});

Auth::routes();

Route::get('/p/create', 'PostsController@create')->name('post.create');

Route::get('/post/{post}', 'PostsController@show');

Route::post('/p', 'PostsController@store')->name('post.store');

Route::get('/profile/{user}','ProfilesController@index')->name('profile');

Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');

Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');
