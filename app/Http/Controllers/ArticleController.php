<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    	$article = [];
    	foreach ($this->articles as $one) {
    		if ($one['id'] == $id) {
    			$article = $one;
    			break;
    		}
    	}

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
    	$title = $this->request->input('title');
    	$content = $this->request->input('content');
       
        // временная переменная до подключения валидатора и модели
        $articleAdded = false;
         
    	if ($articleAdded){	

            $message =  "Будет добавлена статья c названием \"$title\" Текст статьи: $content";
            return view('message' ,
                ['message' => $message]);  

        } else {
            return redirect()->back()->withInput();
        }     		
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
