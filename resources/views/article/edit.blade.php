<form method="post">

 {{ csrf_field() }}
    Заголовок статьи<br>
   @foreach ($errors->get('title') as $message)
        <ul>
            <li class = "error">{{ $message }}</li>
        </ul>
	@endforeach
    <input type="text" name="title" size="80" value ="{{old('title',$article->title)}}"><br>

    Текст статьи<br>
    @foreach ($errors->get('content') as $message)
        <ul>
            <li class = "error">{{ $message }}</li>
        </ul>
	@endforeach
    <textarea name="content"  cols="80" rows="10" >{{old('content',$article->content)}}</textarea><br>

    @if (count($tags)>0)
    Теги:<br>
        @foreach ($tags as $tag)  
            @if (in_array($tag->id, $ownTags))
                <input type="checkbox" name = "tags[]" value="{{$tag->id}}" checked>{{$tag->name}}<br> 
            @else
                <input type="checkbox" name = "tags[]" value="{{$tag->id}}">{{$tag->name}}<br> 
            @endif
        @endforeach    
    @endif
     <input type="submit" value="Сохранить"><br>
</form>
