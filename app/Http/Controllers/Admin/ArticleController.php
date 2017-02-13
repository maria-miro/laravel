<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Article;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    public function manageArticles()
    {
        $articles = Article::latest('updated_at')->get();
        return view('layouts.secondary', [
            'page' => 'admin.articles',
            'title' => 'Управление статьями',
            'articles' => $articles,
            'activeMenu' => 'admin',
        ]);     
    }

    public function deleteArticles()
    {        
        $articles = $this->request->input('deletes');
        $ids = $this->request->input('deletes');
        
        foreach ($ids as $id) {
            Article::find($id)->deleteWithComments();
        }
        Cache::flush();
        return redirect()->back();
    }
}
