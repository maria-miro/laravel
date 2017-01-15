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
			'ArticleController@addArticle');

	Route::post('/add', 
			'ArticleController@addArticlePost');

	Route::get('/{id}/edit', 
			'ArticleController@editArticle')
			->where('id', '[0-9]+');

	Route::post('/{id}/edit', 
			'ArticleController@editArticlePost')
			->where('id', '[0-9]+');

	Route::get('/{id}/delete', 
			'ArticleController@deleteArticle')
			->where('id', '[0-9]+');

	Route::post('/{id}/delete', 
			'ArticleController@deleteArticlePost')
			->where('id', '[0-9]+');
});


Route::group(['prefix' => 'admin',
			'namespace' => 'Admin'],
			 function(){
	Route::get('/articles', 'ArticleController@editAllArticles');	 	
	Route::get('/users', 'UserController@editAllUsers');	 	
});


Route::get('/login', 'LoginController@login');

Route::post('/login', 'LoginController@loginPost');

Route::get('/logout', 'LoginController@logout');

Route::get('/register', 'AuthController@register');
Route::post('/register', 'AuthController@registerPost');





