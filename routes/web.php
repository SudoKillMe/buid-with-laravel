<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'ArticleController@index');

Route::get('/articles/category/{category}', 'ArticleController@category');
Route::get('/articles/archives/{archive}', 'ArticleController@archive');
Route::resource('/articles', 'ArticleController');

Route::get('/login', 'UserController@loginPage');
Route::get('/register', 'UserController@registerPage');
Route::post('login', 'UserController@login');
Route::post('/register', 'UserController@register');
Route::get('/logout', 'UserController@logout');

Route::get('/api/archives', 'ArticleController@apiArchives');