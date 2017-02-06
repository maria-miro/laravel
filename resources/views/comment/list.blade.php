<h3>Комментарии({{count($comments)}})</h3>

   <!-- commentlist -->
   <ol class="commentlist">
@foreach ($comments as $comment)

      <li class="depth-1">
         <div class="comment-content">
         	<a name="comment/{{$comment->id}}"></a>
             <div class="comment-info">
					<span>{{$comment->updated_at}}</span>
					<span class="meta-sep">&bull;</span>
					<span>{{$comment->user['name']}}</span>
             </div>

             <div class="comment-text">
                <p>{{$comment->text}}</p>
                @can('delete', $comment)  
                  <a href="{{route('comment.delete', ['articleId' => $article->id, 'commentId' => $comment->id])}}">Удалить комментарий</a>
                @endcan
             </div>
          </div>
      </li>
@endforeach
   </ol> <!-- Commentlist End -->
