@forelse ($articles as $article)

<article class="entry">

	<header class="entry-header">

		<h3 class="entry-title">
    		<a href="{{route('article.one', ['id' => $article->id])}}">{{$article->title}}</a><hr>
		</h3> 				 
	
		<div class="entry-meta">
			<ul>
				<li>{{getRusDate($article->updated_at)}}</li>
				<span class="meta-sep">&bull;</span>

				<li>{{$article->tagList()}}</li>
				<span class="meta-sep">&bull;</span>
				<li>{{$article->user->name}}</li>
			</ul>
		</div> 
	 
	</header> 
	
	<div class="entry-content">
		<p>{{makeDescription($article->content)}}</p>
	</div> 

</article> <!-- end entry -->
@empty
    <p>{{trans('articles.no_list')}}</p>
@endforelse