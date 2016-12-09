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
// Route::get('/', 'UserController@index');
// Route::get('/edit', 'ArticleController@edit');
// Route::get('/logout', 'UserController@logout');
// Route::post('/login', 'UserController@login');
// Route::post('/register', 'UserController@register');

// Route::post('/edit/save', 'ArticleController@save');
// Route::get('/auth/login', function () {
// 	return view('auth.login');
// });
Route::get('/', 'ArticleController@index');
Route::resource('/articles', 'ArticleController');

Route::get('/admin/article', 'AdminController@article');