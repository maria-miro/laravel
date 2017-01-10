<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class UserController extends Controller
{
    
    public function editAllArticles()
    {
    	return view('admin.users');		
    }

}
