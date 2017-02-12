<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Article;
use App\Http\Models\Comment;
use App\Http\Models\Tag;
use Illuminate\Support\Facades\Cache;


class ArticleController extends Controller
{
    public function showList()
    {
        $articles = Cache::remember('articles', env('CACHE_TIME', 0), function () {
            return Article::latest('updated_at')->with('user','tags')->get();
        });

        return view('layouts.primary', [
                'page' => 'article.list',
                'title' => 'Главная',
                'articles' => $articles,
                'activeMenu' => 'home',
            ]); 
       	
    }

    public function listByTag(Tag $tag)
    {
        $articles = $tag->articles()->latest('updated_at')->get();
        $listName = "Найдено по тегу: $tag->name";
        return view('layouts.primary', [
            'page' => 'article.list',
            'title' => $listName,
            'listName' => $listName,
            'articles' => $articles,
        ]);     
    }

    public function showOne(Article $article)
    {
        $comments = $article->comments()->get();
        $tags = $article->tags()->get();
        return view('layouts.primary', [
            'page' => 'article.one',
            'title' => $article->title,
            'article' => $article,
            'comments' => $comments,
            'tags' => $tags,
        ]);        
    }

    public function addArticle()
    {
        return view('layouts.primary', [
            'page' => 'article.add',
            'title' => 'Новая статья',
            'tags' => Tag::all(),
            'activeMenu' => 'add',
        ]); 
    }   

    public function addArticlePost()
    {
        $this->validate($this->request, [
            'title' => 'required|min:5|max:150|',
            'content' => 'required|min:10',
         ]);

         $article = Article::create([
            'title' => $this->request->input('title'),
            'content' => $this->request->input('content'),
            'user_id' => auth()->user()->id,
            ]); 

        $id = $article->id;

        if ($id) {
            $article->tags()->attach($this->request->input('tags')); 
            Cache::flush();         
            return redirect()->route('article.one', ['id' => $id])
                ->with('message', trans('articles.added'));
        } else {
            return redirect()->back()
                ->with('message', trans('articles.not_added'));
        }     
    }

    public function editArticle(Article $article)
    {
        if(!empty(old('tags'))){
            $ownTags = old('tags'); 
        } else {
            $ownTags = $article->tags()->pluck('id')->all(); 
        }       

        return view('layouts.primary', [
            'page' => 'article.edit',
            'title' => 'Редактирование статьи',
            'article' => $article,
            'tags' => Tag::all(),
            'ownTags' => $ownTags,
            'activeMenu' => 'edit',
        ]); 
    }   

    public function editArticlePost(Article $article)
    {  
        $this->validate($this->request, [
            'title' => 'required|min:5|max:150|',
            'content' => 'required|min:10',
         ]);

        $result = $article->update([
            'title' => $this->request->input('title'),
            'content' => $this->request->input('content'),
            ]);
          
        if ($result) {
            if ($this->request->input('tags')) {
                $article->tags()->sync($this->request->input('tags'));  
            }
            Cache::flush();
            return redirect()->route('article.one', ['id' => $article->id])
                ->with('message', trans('articles.edited'));
        } else {
            return redirect()->back()
                ->with('message', trans('articles.not_edited'));
        }          
    }

    public function deleteArticle(Article $article)
    {
        return view('layouts.primary', [
            'page' => 'article.deleteConfirm',
            'title' => 'Удаление статьи',
            'item' => 'статью',
        ]); 
    }

    public function deleteArticlePost(Article $article)
    {    
        if ($this->request->input('cancel')) {
            return redirect()->route('article.one', ['id' => $article->id]);
        } 
        
        if ($this->request->input('confirm')){
            $result = $article->deleteWithComments();
            if ($result) {
                Cache::flush();
                return redirect()->home()
                    ->with('message', trans('articles.deleted'));
            } else {
                return redirect()->route('article.one', ['id' => $article->id])
                    ->with('message', trans('articles.not_deleted'));
            }
        } 
    }
}
