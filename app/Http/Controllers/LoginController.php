<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class LoginController extends Controller
{
    
    public function GetLogin()
    {
    	return view('login');		
    }

    public function PostLogin()
    {
    	// добавить валидацию, функционал
    
    	  return redirect()->home();
	
    }

    public function Logout()
    {
    	// добавить функционал
    	return redirect()->home();
    }
}
