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

Route::get('/', 'ArticleController@List')
			->name('home')	;

Route::group(['prefix' => 'article'], function(){

	Route::get('/{id}',
		 	'ArticleController@View')
			->where('id', '[0-9]+');

	Route::get('/add', 
			'ArticleController@GetAdd');

	Route::post('/add', 
			'ArticleController@PostAdd');

	Route::get('/{id}/edit', 
			'ArticleController@GetEdit')
			->where('id', '[0-9]+');

	Route::post('/{id}/edit', 
			'ArticleController@PostEdit')
			->where('id', '[0-9]+');

	Route::get('/{id}/delete', 
			'ArticleController@GetDelete')
			->where('id', '[0-9]+');

	Route::post('/{id}/delete', 
			'ArticleController@PostDelete')
			->where('id', '[0-9]+');

});


Route::get('/login', 
			'UserController@GetLogin');

Route::post('/login', 
			'UserController@PostLogin');

Route::get('/logout', 'UserController@Logout');





