<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    
    // Временный массив до подключения базы
	protected $articles = [
	['id' => 1, 'title' =>  'Статья 1', 'content' => 'Текст статьи 1'],
	['id' => 2, 'title' =>  'Статья 2', 'content' => 'Текст статьи 2'],
	['id' => 3, 'title' =>  'Статья 3', 'content' => 'Текст статьи 3'],
	['id' => 4, 'title' =>  'Статья 4', 'content' => 'Текст статьи 4']
    			];

    public function showList()
    {
        return view('article.list' , ['articles' => $this->articles]);		
    }

    public function showOne($id)
    {
    	$article = DB::table('articles')->where('id', $id)->first();
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

        $id  = DB::table('articles')->insertGetId([
            'title' => $this->request->input('title'),
            'content' => $this->request->input('content'),
            'user_id' => auth()->user()->id,
            'created_at' => \Carbon\Carbon::createFromTimestamp(time())->format('Y-m-d H:i:s'),
            'updated_at' => \Carbon\Carbon::createFromTimestamp(time())->format('Y-m-d H:i:s'),
        ]);       
        
        return redirect()->route('article.one', ['id' => $id])->with('msg','ok');   		
    }

    public function editArticle($id)
    {
        // Получение title content из модели по $id
        $title = '111';
        $content = '222';

        return view('article.edit', [
                 'title' => $title,  
                 'content' => $content,  
                 ]); 
    }   

    public function editArticlePost($id)
    {
        $title = $this->request->input('title');
        $content = $this->request->input('content');
       
        // временная переменная до подключения валидатора и модели
        $articleAdded = true;
         
        if ($articleAdded){ 
            $message =  "Будет отредактирована статья id $id c названием \"$title\" Текст статьи: $content";
            return view('message' ,
                ['message' => $message]);  

        } else {
            return view('article.add', [
                 'title' => $title,  
                 'content' => $content,  
                 ]);  
        }           
    }

    public function deleteArticle($id)
    {
        // Проверка, что такая статья существует
        $articleExists = true;

        if ($articleExists) {
            return view('article.deleteConfirm');
        } else {
            $message =  "Такой статьи не существует";
            return view('message' ,
                ['message' => $message]); 
        }
    }

    public function deleteArticlePost($id)
    {
        if ($this->request->input('cancel')) {
            return redirect()->to("article/$id");
        } 
        
        if ($this->request->input('confirm')){

        // временная переменная до подключения модели
            $articleDeleted = true;
            
            $message = $articleDeleted ? 'Статья успешно удалена' : 'Не удалось удалить статью';
            return view('message' ,
                ['message' => $message]); 
        } 
    }
}
