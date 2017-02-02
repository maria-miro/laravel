@forelse ($articles as $article)

<article class="entry">

	<header class="entry-header">

		<h2 class="entry-title">
    		<a href="{{route('article.one', ['id' => $article->id])}}">{{$article->title}}</a><hr>
		</h2> 				 
	
		<div class="entry-meta">
			<ul>
				<li>{{$article->updated_at}}</li>
				<span class="meta-sep">&bull;</span>								
				<li><a href="#" title="" rel="category tag">tag</a></li>
				<span class="meta-sep">&bull;</span>
				<li>{{$article->user->name}}</li>
			</ul>
		</div> 
	 
	</header> 
	
	<div class="entry-content">
		<p></p>
	</div> 

</article> <!-- end entry -->
@empty
    <p>{{trans('articles.no_list')}}</p>
@endforelse