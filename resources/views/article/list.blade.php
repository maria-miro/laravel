@extends ('base')

@section ('content')
    <h1>Список новостей</h1><hr>

    @forelse ($articles as $article)
        <a href="/article/<?=$article['id']?>"><?=$article['title']?></a><hr>
    @empty
        <p>Нет новостей для отображения</p>
    @endforelse

 @endsection   
