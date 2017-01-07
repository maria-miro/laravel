<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class UserController extends Controller
{
    
    public function GetLogin()
    {
    	return view('login');		
    }

    public function PostLogin()
    {
    	View::share('auth', true);
    	  return redirect()->back();
	
    }

    public function Logout()
    {
    	View::share('auth', false);
    	return redirect()->home();
    }
}
