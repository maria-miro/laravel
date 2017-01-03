@extends ('base')

@section ('content')
    <form method="post">

     {{ csrf_field() }}
        Заголовок статьи<br>
        <input type="text" name="title" size="80" value ={{ $title or ''}}><br>
        <div class = "error"> {{--$errors['title'] or ''--}} </div>

        Текст статьи<br>
        <textarea name="content"  cols="80" rows="10" >{{$content or ''}}</textarea><br>
         <div class = "error"> {{--$errors['content'] or ''--}} </div>

         <input type="submit" value="Сохранить"><br>
    </form>
 @endsection  
