@extends ('base')

@section ('content')
    <form method="post">

     {{ csrf_field() }}
        Заголовок статьи<br>
        <input type="text" name="title" size="80" value ="{{old('title') or ''}}"><br>

        Текст статьи<br>
        <textarea name="content"  cols="80" rows="10" >{{old('content') or ''}}</textarea><br>
   

         <input type="submit" value="Сохранить"><br>
    </form>
 @endsection  
