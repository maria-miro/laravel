

<article class="entry">
	<header class="entry-header">
		<h2 class="entry-title">
			{{$article->title}}
		</h2> 				 
		<div class="entry-meta">
			<ul>
				<li>{{$article->updated_at}}</li>
				<span class="meta-sep">&bull;</span>
				<li>{{$article->user->name}}</li>
			</ul>
		</div> 
 
	</header> 

	<div class="entry-content-media">
		<div class="post-thumb">
			<img src="images/m-farmerboy.jpg">
		</div> 
	</div>

	<div class="entry-content">
		<p>{{$article->content}} </p>
	</div>

	@if (Auth::check())
	<form>
		<input type="button" value="Редактировать" 
		onClick="location.href=&quot;{{route('article.edit', ['id' => $article->id])}}&quot;">
		<input type="button" value="Удалить"  
		onClick="location.href=&quot;{{route('article.delete', ['id' => $article->id])}}&quot;">
	</form>
	@endif

	@if (count($tags)>0)	
	<p class="tags">
         <span>Теги: </span>
         @foreach ($tags as $tag)
	      	<a href="">{{$tag->name}}   </a>  
	      @endforeach
    </p> 
    @endif

</article>

	<!-- Comments
================================================== -->
<div id="comments">

@if (count($comments) > 0)   
	<h3>Комментарии({{count($comments)}})</h3>
@endif

   <!-- commentlist -->
   <ol class="commentlist">
@forelse ($comments as $comment)

      <li class="depth-1">
         <div class="comment-content">

             <div class="comment-info">
					<span>{{$comment->updated_at}}</span>
					<span class="meta-sep">&bull;</span>
					<span>{{$comment->user['name']}}</span>
             </div>

             <div class="comment-text">
                <p>{{$comment->text}}</p>
             </div>
          </div>
      </li>


@empty
    <h3>Нет комментариев</h3>
@endforelse
   </ol> <!-- Commentlist End -->

   <!-- respond -->
   <div class="respond">

      <h3>Leave a Comment</h3>

	<!-- form -->
	<form name="contactForm" id="contactForm" method="post" action="">
	{{ csrf_field() }}
		<fieldset>
			<div class="message group">
				<label  for="cMessage">Message <span class="required">*</span></label>
				<textarea name="cMessage"  id="cMessage" rows="10" cols="50" ></textarea>
			</div>
			<button type="submit" class="submit">Submit</button>
		</fieldset>
	</form> <!-- Form End -->

   </div> <!-- Respond End -->

</div>  <!-- Comments End -->		