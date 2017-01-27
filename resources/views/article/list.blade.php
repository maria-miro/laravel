@extends ('base')

@section ('content')
    <h1>Список новостей</h1><hr>

    @forelse ($articles as $article)
        <a href="{{route('article.one', ['id' => $article->id])}}">{{$article->title}}</a><hr>
    @empty
        <p>{{trans('articles.no_list')}}</p>
    @endforelse

 @endsection   
