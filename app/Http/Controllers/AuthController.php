<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
    	return view('auth.register', []);
    }

        public function registerPost()
    {
    	// trim();
    	// strtolower();
    	$this->validate($this->request, [
    		'email' => 'required|email|unique:users|max:255',
    		'name' => 'required|max:255',
    		'password' =>'required|max:255|min:6',
    		'password2' =>'required|same:password',


    	 	]);



    	return 'ok';
    }

}
