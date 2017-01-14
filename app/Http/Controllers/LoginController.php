<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class LoginController extends Controller
{
    
    public function login()
    {
    	return view('login');		
    }

    public function loginPost()
    {
    	// добавить валидацию, функционал
        session(['auth' => true]);
    	return redirect()->home();
    }

    public function logout()
    {
    	// добавить функционал
        session(['auth' => false]);
    	return redirect()->home();
    }
}
