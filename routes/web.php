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

Route::get('/', 'ArticleController@showList')
			->name('home')	;

Route::group(['prefix' => 'article'], function(){

	Route::get('/{id}',
		 	'ArticleController@showOne')
			->where('id', '[0-9]+');

	Route::get('/add', 
			'ArticleController@getAdd');

	Route::post('/add', 
			'ArticleController@postAdd');

	Route::get('/{id}/edit', 
			'ArticleController@getEdit')
			->where('id', '[0-9]+');

	Route::post('/{id}/edit', 
			'ArticleController@postEdit')
			->where('id', '[0-9]+');

	Route::get('/{id}/delete', 
			'ArticleController@getDelete')
			->where('id', '[0-9]+');

	Route::post('/{id}/delete', 
			'ArticleController@postDelete')
			->where('id', '[0-9]+');
});


Route::group(['prefix' => 'admin',
			'namespace' => 'Admin'],
			 function(){
	Route::get('/articles', 'ArticleController@editAllArticles');	 	
	Route::get('/users', 'UserController@editAllUsers');	 	
});


Route::get('/login', 'LoginController@getLogin');

Route::post('/login', 'LoginController@postLogin');

Route::get('/logout', 'LoginController@logout');





