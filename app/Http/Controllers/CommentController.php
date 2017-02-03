<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Comment;

class CommentController extends Controller
{
    
    public function addCommentPost($articleId)
    {
        $this->validate($this->request, [
            'text' => 'required|min:5|max:500|',
         ]);

         $comment = Comment::create([
            'text' => $this->request->input('text'),
            'user_id' => auth()->user()->id,
            'article_id' => $articleId,
            ]); 

         $id = $comment->id;

        if ($id) {           
            return redirect(route('article.one', ['id' => $articleId]) . "#comment/$id")
                ->with('message', trans('comments.added'));
        } else {
            return redirect()->back()
                ->with('message', trans('comments.not_added'));
        }     
    }


	public function deleteComment($articleId, $commentId)
    {
        Comment::findOrFail($commentId);
        return view('layouts.primary', [
            'page' => 'article.deleteConfirm',
            'title' => 'Удаление комментария',
            'item' => 'комментарий',
        ]); 
    }

    public function deleteCommentPost($articleId, $commentId)
    {    
        if ($this->request->input('cancel')) {
            return redirect()->route('article.one', ['id' => $articleId]);
        } 
        
        if ($this->request->input('confirm')){
            $result = Comment::destroy($commentId);
	 
	        $message = $result ? 'comments.deleted' : 'comments.not_deleted';
	
	        return redirect()->route('article.one', ['id' => $articleId])
                    ->with('message', trans($message));          
        } 
    }
}
