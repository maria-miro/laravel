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

Route::get('/', 'ArticleController@showList')->name('home')	;

Route::get('/help', function () {
    return dump(auth()->user()->id);
});

Route::group(['prefix' => 'article'], function(){

	Route::get('/{id}','ArticleController@showOne')
		->where('id', '[0-9]+')->name('article.one');

	Route::get('/add', 'ArticleController@addArticle')
		->middleware('auth')->name('article.add');

	Route::post('/add', 'ArticleController@addArticlePost')
		->middleware('auth')->name('article.addPost');

	Route::get('/{id}/edit', 'ArticleController@editArticle')
		->where('id', '[0-9]+')->middleware('auth')->name('article.edit');

	Route::post('/{id}/edit', 'ArticleController@editArticlePost')
		->where('id', '[0-9]+')->middleware('auth')->name('article.editPost');

	Route::get('/{id}/delete', 'ArticleController@deleteArticle')
		->where('id', '[0-9]+')->middleware('auth')->name('article.delete');

	Route::post('/{id}/delete', 'ArticleController@deleteArticlePost')
		->where('id', '[0-9]+')->middleware('auth')->name('article.deletePost');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
		Route::get('/articles', 'ArticleController@editAllArticles')->name('admin.articles');	 	
		Route::get('/users', 'UserController@editAllUsers')->name('admin.users');	 	
});

Route::get('/login', 'LoginController@login')->name('login');
Route::post('/login', 'LoginController@loginPost')->name('loginPost');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::get('/register', 'AuthController@register')->name('register');
Route::post('/register', 'AuthController@registerPost')->name('registerPost');





