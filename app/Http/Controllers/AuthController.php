<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Models\User;


class AuthController extends Controller
{
    public function register()
    {
        return view('layouts.primary', [
            'page' => 'auth.register',
            'title' => 'Регистрация',
            'activeMenu' => 'register',
        ]); 
    }

    public function registerPost()
    {
    	$this->validate($this->request, [
    		'email' => 'required|email|unique:users|max:255',
    		'name' => 'required|max:255',
    		'password' =>'required|max:255|min:6',
    		'password2' =>'required|same:password',
    	 ]);

        $user = User::create([
            'email' => $this->request->input('email'),
            'name' => $this->request->input('name'),
            'password' => bcrypt($this->request->input('password')),
            ]); 
        $id = $user->id;

    	if ($id) {
            return redirect()->home()
                ->with('message', trans('auth.registed'));
        } else {
            return redirect()->back()
                ->withInput($this->request->only('email', 'name'))
                ->with('message', trans('auth.not_registed'));
        }          
    }

    public function login()
    {
        return view('layouts.primary', [
            'page' => 'auth.login',
            'title' => 'Авторизация',
            'activeMenu' => 'login',
        ]);        
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
                ->withErrors(['email' => trans('auth.failed')]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
