<?php


// Функция для определения, авторизован ли пользователь
function path()	
{
	$request = resolve('Illuminate\Http\Request');
	return $request->path();
}
