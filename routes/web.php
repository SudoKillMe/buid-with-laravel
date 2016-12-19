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

// Route::get('/articles/category/{category}', 'ArticleController@category');
// Route::get('/articles/archives/{archive}', 'ArticleController@archive');
// Route::get('/argicles/{type}/{category}');
// Route::resource('/articles', 'ArticleController');

Route::group(['prefix' => 'articles'], function () {

	Route::get('category/{category}', 'ArticleController@category');
	Route::get('archives/{archive}', 'ArticleController@archive');

	Route::get('/', 'ArticleController@index');
	Route::get('create/{type?}', 'ArticleController@create');
	Route::get('{article}', 'ArticleController@show');
	Route::get('{type?}/{article}/edit', 'ArticleController@edit');
	Route::post('{type?}', 'ArticleController@store');
	Route::put('{type?}/{article}', 'ArticleController@update');
	Route::delete('{article}', 'ArticleController@destroy');

});

Route::group(['prefix' => 'user'], function () {

	Route::get('/login', 'UserController@loginPage');
	Route::get('/register', 'UserController@registerPage');
	Route::post('login', 'UserController@login');
	Route::post('/register', 'UserController@register');
	Route::get('/logout', 'UserController@logout');
	
});

Route::get('/api/archives', 'ArticleController@apiArchives');