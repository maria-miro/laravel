@extends ('base')

@section ('content')

	<section class="page">					

		<h2 class="entry-title">
			{{$article->title}}
		</h2>
        <p >
        	 {{$article->content}} <br>
        	 <i>{{$article->user->name}}</i>
       	</p>
	@if (Auth::check())
	<form>
		<input type="button" value="Редактировать" 
		onClick="location.href=&quot;{{route('article.edit', ['id' => $article->id])}}&quot;">
		<input type="button" value="Удалить"  
		onClick="location.href=&quot;{{route('article.delete', ['id' => $article->id])}}&quot;">
	</form>
	@endif
</section>	
@endsection  

