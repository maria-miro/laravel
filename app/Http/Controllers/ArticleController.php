<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Article;

class ArticleController extends Controller
{
    public function showList()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('article.list' , ['articles' => $articles]);		
    }

    public function showOne($id)
    {
    	$article = Article::where('id', $id)->first();
        if (!empty($article)) {
            return view('article.one' , ['article' => $article]);       
        } else {
            abort(404);
        }
    }

    public function addArticle()
    {
        return view('article.add');
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
            return redirect()->route('article.one', ['id' => $id])
                ->with('message', trans('articles.added'));
        } else {
            return redirect()->back()->withInput()
                ->with('message', trans('articles.not_added'));
        }     
    }

    public function editArticle($id)
    {
        $article = Article::findOrFail($id);

        return view('article.edit', [
                 'title' => $article->title,  
                 'content' => $article->content,  
                 ]); 
    }   

    public function editArticlePost($id)
    {  
        $this->validate($this->request, [
            'title' => 'required|min:5|max:150|',
            'content' => 'required|min:10',
         ]);

        $article = Article::find($id);
        $article->title = $this->request->input('title');
        $article->content = $this->request->input('content');
        $result = $article->save();
          
        if ($result) {
            return redirect()->route('article.one', ['id' => $id])
                ->with('message', trans('articles.edited'));
        } else {
            return redirect()->back()->withInput()
                ->with('message', trans('articles.not_edited'));
        }          
    }

    public function deleteArticle($id)
    {
        $article = Article::findOrFail($id);

        return view('article.deleteConfirm');
    }

    public function deleteArticlePost($id)
    {    
        if ($this->request->input('cancel')) {
            return redirect()->route('article.one', ['id' => $id]);
        } 
        
        if ($this->request->input('confirm')){
            $result = Article::destroy($id);

            if ($result) {
                return redirect()->home()
                    ->with('message', trans('articles.deleted'));
            } else {
                return redirect()->route('article.one', ['id' => $id])
                    ->with('message', trans('articles.not_deleted'));
            }
        } 
    }
}
