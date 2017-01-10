<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class LoginController extends Controller
{
    
    public function getLogin()
    {
    	return view('login');		
    }

    public function postLogin()
    {
    	// добавить валидацию, функционал
    
    	  return redirect()->home();
    }

    public function logout()
    {
    	// добавить функционал
    	return redirect()->home();
    }
}
