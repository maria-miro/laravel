<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\User;

class UserController extends Controller
{  
	public function manageUsers()
    {
        $users = User::where('role_id', '!=', 1)->get();
        return view('layouts.secondary', [
            'page' => 'admin.users',
            'title' => 'Управление пользователями',
            'users' => $users,
            'activeMenu' => 'admin',
        ]);     
    }

    public function deleteUsers()
    {        
        $ids = $this->request->input('deletes');
        
        foreach ($ids as $id) {
            User::find($id)->deleteWithArticles();
        }
        Cache::flush();
        return redirect()->back();
    }

}
