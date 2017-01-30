<form method="post">

 {{ csrf_field() }}
    Заголовок статьи<br>
   @foreach ($errors->get('title') as $message)
        <ul>
            <li>{{ $message }}</li>
        </ul>
	@endforeach
    <input type="text" name="title" size="80" value ="{{$title}}"><br>

    Текст статьи<br>
    @foreach ($errors->get('content') as $message)
        <ul>
            <li>{{ $message }}</li>
        </ul>
	@endforeach
    <textarea name="content"  cols="80" rows="10" >{{$content}}</textarea><br>

     <input type="submit" value="Сохранить"><br>
</form>
