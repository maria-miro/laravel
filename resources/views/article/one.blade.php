@extends ('base')

@section ('content')

	<section class="page">					

		<h2 class="entry-title">
			{{$article->title}}
		</h2>
        <p class="drop-cap">
        	 {{$article->content}}
       	</p>
	<form>
		<input type="button" value="Редактировать" 
		onClick="location.href=&quot;/article/{{$article->id}}/edit&quot;">
		<input type="button" value="Удалить"  
		onClick="location.href=&quot;/article/{{$article->id}}/delete&quot;">
	</form>
</section>	
@endsection  

