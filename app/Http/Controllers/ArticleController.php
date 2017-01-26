<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;

class ArticleController extends Controller
{
    public function showList()
    {
       // dump(Article::all()->chunk(4));
        $articles = Article::all()->count();

       // $articles = $articles->reject(function ($article) {
       //      return $article->id > 7;
       //  });
        // Article::chunk(4,function ($articles) {
        //     dump($articles);  
        // });

        // foreach (Article::where('id', '>', 6)->cursor() as $article) {
        //     dump($article);

        // $article = Article::find(2);
        // $article = Article::findOrFail(1);
        // $articles = Article::all()->count();


    
       dump($articles);

        // $articles = Article::orderBy('created_at', 'desc')->get();
        // return view('article.list' , ['articles' => $articles]);		
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

        $article = new Article;

        $article->title = $this->request->input('title');
        $article->content = $this->request->input('content');
        $article->user_id = auth()->user()->id;
        $article->save();
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
            dump($result);
            die;

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
