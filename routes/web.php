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

	Route::get('/{articleId}','ArticleController@showOne')
		->where('articleId', '[0-9]+')->name('article.one');

	Route::get('/add', 'ArticleController@addArticle')
		->middleware('auth')->name('article.add');

	Route::post('/add', 'ArticleController@addArticlePost')
		->middleware('auth')->name('article.addPost');

	Route::get('/{articleId}/edit', 'ArticleController@editArticle')
		->where('articleId', '[0-9]+')->middleware('auth')->name('article.edit');

	Route::post('/{articleId}/edit', 'ArticleController@editArticlePost')
		->where('articleId', '[0-9]+')->middleware('auth')->name('article.editPost');

	Route::get('/{articleId}/delete', 'ArticleController@deleteArticle')
		->where('articleId', '[0-9]+')->middleware('auth')->name('article.delete');

	Route::post('/{articleId}/delete', 'ArticleController@deleteArticlePost')
		->where('articleId', '[0-9]+')->middleware('auth')->name('article.deletePost');


	Route::post('/{articleId}/comment/add', 'CommentController@addCommentPost')
		->where('articleId', '[0-9]+')->middleware('auth')->name('comment.addPost');

	Route::get('/{articleId}/comment/{commentId}/delete', 'CommentController@deleteComment')
		->where(['articleId' => '[0-9]+','commentId' => '[0-9]+'])->middleware('auth')->name('comment.delete');

	Route::post('/{articleId}/comment/{commentId}/delete', 'CommentController@deleteCommentPost')
		->where(['articleId' => '[0-9]+','commentId' => '[0-9]+'])->middleware('auth')->name('comment.deletePost');

	Route::get('/tag/{tagId}','ArticleController@listByTag')
		->where('tagId', '[0-9]+')->name('article.listByTag');



});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
		Route::get('/articles', 'ArticleController@editAllArticles')->name('admin.articles');	 	
		Route::get('/users', 'UserController@editAllUsers')->name('admin.users');	 	
});

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@loginPost')->name('loginPost');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::get('/register', 'AuthController@register')->name('register');
Route::post('/register', 'AuthController@registerPost')->name('registerPost');





