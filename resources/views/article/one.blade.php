<article class="entry">
	<header class="entry-header">
		<h2 class="entry-title">
			{{$article->title}}
		</h2> 				 
		<div class="entry-meta">
			<ul>
				<li>{{getRusDate($article->updated_at)}}</li>
				<span class="meta-sep">&bull;</span>
				<li>{{$article->user->name}}</li>
			</ul>
		</div> 
	</header> 


	<div class="entry-content-media">
		<div class="post-thumb">
			<img src="{{$article->image or ''}}">
		</div> 
	</div>

	<div class="entry-content">
		<p>{!! nl2br($article->content) !!} </p>
	</div>

	<form>
		@can('update', $article)
		    <input type="button" value="Редактировать" 
				onClick="location.href=&quot;{{route('article.edit', ['articleId' => $article->id])}}&quot;">
		@endcan
		@can('delete', $article)  
			<input type="button" value="Удалить"  
				onClick="location.href=&quot;{{route('article.delete', ['articleId' => $article->id])}}&quot;">	
		@endcan
	</form>
	

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
		@include('comment.list')
	@else
	    <h3>Нет комментариев</h3><hr>
	@endif


	@if (Auth::check())
		@include('comment.add')
	@else
		<a href="{{route('login')}}">Войдите, чтобы оставить комментарий</a>
	@endif

</div>  <!-- Comments End -->		