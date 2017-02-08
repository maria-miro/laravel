<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Article;
use App\Http\Models\Comment;
use App\Http\Models\Tag;

class ArticleController extends Controller
{
    public function showList()
    {
        $articles = Article::latest('updated_at')->get();
        return view('layouts.primary', [
            'page' => 'article.list',
            'title' => 'Главная',
            'articles' => $articles,
            'activeMenu' => 'home',
        ]);		
    }

    public function listByTag($tagId)
    {
        $tag = Tag::findOrFail($tagId);
        $articles = $tag->articles()->latest('updated_at')->get();
        return view('layouts.primary', [
            'page' => 'article.list',
            'title' => $tag,
            'articles' => $articles,
        ]);     
    }

    public function showOne($articleId)
    {
        $article = Article::where('id', $articleId)->firstOrFail();
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
        $tags = Tag::all();
        return view('layouts.primary', [
            'page' => 'article.add',
            'title' => 'Новая статья',
            'tags' => $tags,
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
            
            return redirect()->route('article.one', ['id' => $id])
                ->with('message', trans('articles.added'));
        } else {
            return redirect()->back()
                ->with('message', trans('articles.not_added'));
        }     
    }

    public function editArticle($articleId)
    {
        $article = Article::findOrFail($articleId);

        $this->authorize('update', $article);

        return view('layouts.primary', [
            'page' => 'article.edit',
            'title' => 'Редактирование статьи',
            'article' => $article,
            'activeMenu' => 'edit',
        ]); 
    }   

    public function editArticlePost($articleId)
    {  
        
        $article = Article::find($articleId);
        $this->authorize('update', $article);

        $this->validate($this->request, [
            'title' => 'required|min:5|max:150|',
            'content' => 'required|min:10',
         ]);

        $result = $article->update([
            'title' => $this->request->input('title'),
            'content' => $this->request->input('content'),
            ]);
          
        if ($result) {
            return redirect()->route('article.one', ['id' => $articleId])
                ->with('message', trans('articles.edited'));
        } else {
            return redirect()->back()
                ->with('message', trans('articles.not_edited'));
        }          
    }

    public function deleteArticle($articleId)
    {
        $article = Article::findOrFail($articleId);

        $this->authorize('delete', $article);

        return view('layouts.primary', [
            'page' => 'article.deleteConfirm',
            'title' => 'Удаление статьи',
            'item' => 'статью',
        ]); 

    }

    public function deleteArticlePost($articleId)
    {    
        if ($this->request->input('cancel')) {
            return redirect()->route('article.one', ['id' => $articleId]);
        } 
        
        if ($this->request->input('confirm')){
            $article = Article::findOrFail($articleId);
            $this->authorize('delete', $article);
            $result = $article->destroy($articleId);

            if ($result) {
                return redirect()->home()
                    ->with('message', trans('articles.deleted'));
            } else {
                return redirect()->route('article.one', ['id' => $articleId])
                    ->with('message', trans('articles.not_deleted'));
            }
        } 
    }
}
