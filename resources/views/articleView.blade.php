@extends ('base')

@section ('content')
        <h1> {{$article['title'] or ''}} </h1><hr>
        <p> {{$article['content'] or ''}}</p><hr>
@endsection  

