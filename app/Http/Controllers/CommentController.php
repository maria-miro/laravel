<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Comment;

class CommentController extends Controller
{
    
    public function addCommentPost($article)
    {
        $this->validate($this->request, [
            'text' => 'required|min:5|max:500|',
         ]);

         $comment = Comment::create([
            'text' => $this->request->input('text'),
            'user_id' => auth()->user()->id,
            'article_id' => $article,
            ]); 

         $id = $comment->id;

        if ($id) {           
            return redirect(route('article.one', ['id' => $article]) . "#comment/$id")
                ->with('message', trans('comments.added'));
        } else {
            return redirect()->back()
                ->with('message', trans('comments.not_added'));
        }     
    }


	public function deleteComment($article, Comment $comment)
    {        
        return view('layouts.primary', [
            'page' => 'article.deleteConfirm',
            'title' => 'Удаление комментария',
            'item' => 'комментарий',
        ]); 
    }

    public function deleteCommentPost($article, Comment $comment)
    {    
        if ($this->request->input('cancel')) {
            return redirect(route('article.one', ['id' => $article]) . "#comment/$comment->id");
        } 
        
        if ($this->request->input('confirm')){
            $result = $comment->destroy($comment->id);
	 
	        $message = $result ? 'comments.deleted' : 'comments.not_deleted';
	
	        return redirect()->route('article.one', ['id' => $article])
                    ->with('message', trans($message));          
        } 
    }
}
