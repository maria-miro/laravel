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

Route::group(['prefix' => 'article'], function(){

	Route::get('/{article}','ArticleController@showOne')->name('article.one');

	Route::get('/add', 'ArticleController@addArticle')->middleware('auth')->name('article.add');

	Route::post('/add', 'ArticleController@addArticlePost')->middleware('auth')->name('article.addPost');

	Route::get('/{article}/edit', 'ArticleController@editArticle')->middleware('can:update,article')->name('article.edit');

	Route::post('/{article}/edit', 'ArticleController@editArticlePost')->middleware('can:update,article')->name('article.editPost');

	Route::get('/{article}/delete', 'ArticleController@deleteArticle')->middleware('can:delete,article')->name('article.delete');

	Route::post('/{article}/delete', 'ArticleController@deleteArticlePost')->middleware('can:delete,article')->name('article.deletePost');

	Route::get('/{article}/comment/add', function (){
		return abort(404);
		});
	
	Route::post('/{article}/comment/add', 'CommentController@addCommentPost')->middleware('auth')->name('comment.addPost');

	Route::get('/{article}/comment/{comment}/delete', 'CommentController@deleteComment')->middleware('can:delete,comment')->name('comment.delete');

	Route::post('/{article}/comment/{comment}/delete', 'CommentController@deleteCommentPost')->middleware('can:delete,comment')->name('comment.deletePost');

	Route::get('/tag/{tag}','ArticleController@listByTag')->name('article.listByTag');



});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
		Route::get('/articles', 'ArticleController@manageArticles')->middleware('admin')->name('admin.articles');	 		 	
		Route::post('/articles', 'ArticleController@deleteArticles')->middleware('admin')->name('admin.articles.delete');	 	
		Route::get('/users', 'UserController@manageUsers')->middleware('admin')->name('admin.users');	
		Route::post('/users', 'UserController@deleteUsers')->middleware('admin')->name('admin.users.delete');		 	
});

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@loginPost')->name('loginPost');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::get('/register', 'AuthController@register')->name('register');
Route::post('/register', 'AuthController@registerPost')->name('registerPost');





