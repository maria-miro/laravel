<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function register()
    {
    	return view('auth.register', []);
    }

    public function registerPost()
    {
    	$this->validate($this->request, [
    		'email' => 'required|email|unique:users|max:255',
    		'name' => 'required|max:255',
    		'password' =>'required|max:255|min:6',
    		'password2' =>'required|same:password',
    	 ]);

    	DB::table('users')->insert([
    		'email' => $this->request->input('email'),
    		'name' => $this->request->input('name'),
    		'password' => bcrypt($this->request->input('password')),
    		'created_at' => \Carbon\Carbon::createFromTimestamp(time())->format('Y-m-d H:i:s'),
    		'updated_at' => \Carbon\Carbon::createFromTimestamp(time())->format('Y-m-d H:i:s'),
    	]); 

    	return 'ok';
    }

}
