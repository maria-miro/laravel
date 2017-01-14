<?php


//Полученик адреса

function path()	
{
	$request = resolve('Illuminate\Http\Request');
	return $request->path();
}
