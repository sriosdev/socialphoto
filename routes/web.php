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

// GENERALS
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

// USERS
Route::get('/config', 'UserController@config')->name('config');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
Route::get('/profile/{id}', 'UserController@profile')->name('user.profile');
Route::get('/people-list/{search?}', 'UserController@index')->name('user.index');


// IMAGE
Route::get('/upload-photo', 'ImageController@create')->name('photo.create');
Route::post('/photo/save', 'ImageController@save')->name('photo.save');
Route::get('/photo/file/{filename}', 'ImageController@getImage')->name('photo.file');
Route::get('/photo/detail/{id}', 'ImageController@detail')->name('photo.detail');
Route::get('/photo/delete/{id}', 'ImageController@delete')->name('photo.delete');
Route::get('/photo/{id}/edit/', 'ImageController@edit')->name('photo.edit');
Route::post('/photo/update/', 'ImageController@update')->name('photo.update');

// COMMENTS
Route::post('/comment/save', 'CommentController@save')->name('comment.save');
Route::get('/comment/delete/{id}', 'CommentController@delete')->name('comment.delete');

// LIKES
Route::get('/like/{id}', 'LikeController@like')->name('like.save');
Route::get('/dislike/{id}', 'LikeController@dislike')->name('like.delete');
Route::get('/likes', 'LikeController@index')->name('likes');

