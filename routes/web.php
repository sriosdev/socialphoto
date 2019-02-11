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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/config', 'UserController@config')->name('config');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
Route::get('/upload-photo', 'ImageController@create')->name('photo.create');
Route::post('/photo/save', 'ImageController@save')->name('photo.save');
Route::get('/photo/file/{filename}', 'ImageController@getImage')->name('photo.file');
Route::get('/photo/detail/{id}', 'ImageController@detail')->name('photo.detail');
