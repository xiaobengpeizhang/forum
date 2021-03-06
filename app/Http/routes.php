<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','PostsController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
Route::resource('discussion','PostsController');
Route::resource('comment','CommentsController');

Route::get('/user/avatar','UserController@avatar');
Route::post('/user/avatar','UserController@update');

