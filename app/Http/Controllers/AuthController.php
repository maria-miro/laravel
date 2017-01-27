<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
    	return view('auth.register');
    }

    public function registerPost()
    {
    	$this->validate($this->request, [
    		'email' => 'required|email|unique:users|max:255',
    		'name' => 'required|max:255',
    		'password' =>'required|max:255|min:6',
    		'password2' =>'required|same:password',
    	 ]);

    	$result = DB::table('users')->insert([
    		'email' => $this->request->input('email'),
    		'name' => $this->request->input('name'),
    		'password' => bcrypt($this->request->input('password')),
    		'created_at' => \Carbon\Carbon::createFromTimestamp(time())->format('Y-m-d H:i:s'),
    		'updated_at' => \Carbon\Carbon::createFromTimestamp(time())->format('Y-m-d H:i:s'),
    	]); 

    	if ($result) {
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
        return view('auth.login');       
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
