<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;


class LoginController extends Controller
{
    
    public function login()
    {
    	return view('login');		
    }

    public function loginPost()
    {
    	$remember = $this->request->input('remember') ? true : false;
        if (Auth::attempt([
            'email' => $this->request->input('email'),
            'password' => $this->request->input('password')
            ], $remember)) {
            return redirect()->intended();
        } else {
           
            return redirect()->back()
                ->withInput($this->request->only('email', 'remember'))
                ->withErrors([
                    'email' => Lang::get('auth.failed'),
            ]);

        }

    }

    public function logout()
    {
    	// добавить функционал
        Auth::logout();
    	return redirect()->home();
    }
}
