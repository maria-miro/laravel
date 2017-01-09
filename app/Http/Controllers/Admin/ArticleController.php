<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    
    // Временный массив до подключения базы
	protected $articles = [
	['id' => 1, 'title' =>  'Статья 1', 'content' => 'Текст статьи 1'],
	['id' => 2, 'title' =>  'Статья 2', 'content' => 'Текст статьи 2'],
	['id' => 3, 'title' =>  'Статья 3', 'content' => 'Текст статьи 3'],
	['id' => 4, 'title' =>  'Статья 4', 'content' => 'Текст статьи 4']
    			];
    //
    public function Editor()
    {
        return view('admin.articles' , ['articles' => $this->articles]);		
    }


}
