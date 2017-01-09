@extends ('base')

@section ('content')
    <h1>Список новостей</h1><hr>

    @forelse ($articles as $article)
        <p>{{$article['title']}} </p>
     	<a href = "/article/{{$article['id']}}/edit/">Редактировать</a>   
		<a href = "/article/{{$article['id']}}/delete/">Удалить</a>
		<hr>
    @empty
        <p>Нет новостей для отображения</p>
    @endforelse

 @endsection   
