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
Route::post('/comment/save', 'CommentController@save')->name('comment.save');
Route::get('/comment/delete/{id}', 'CommentController@delete')->name('comment.delete');
Route::get('/like/{id}', 'LikeController@like')->name('like.save');
Route::get('/dislike/{id}', 'LikeController@dislike')->name('like.delete');
Route::get('/likes', 'LikeController@index')->name('likes');
Route::get('/profile/{id}', 'UserController@profile')->name('user.profile');
