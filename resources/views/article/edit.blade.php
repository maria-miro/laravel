<form method="post">

 {{ csrf_field() }}
    Заголовок статьи<br>
   @foreach ($errors->get('title') as $message)
        <ul>
            <li class = "error">{{ $message }}</li>
        </ul>
	@endforeach
    <input type="text" name="title" size="80" value ="{{$article->title}}"><br>

    Текст статьи<br>
    @foreach ($errors->get('content') as $message)
        <ul>
            <li class = "error">{{ $message }}</li>
        </ul>
	@endforeach
    <textarea name="content"  cols="80" rows="10" >{{$article->content}}</textarea><br>

    @if (count($tags)>0)
    Теги:<br>
    @endif
    @forelse ($tags as $tag)
        @if (in_array($tag->id, $ownTags))
            <input type="checkbox" name = "tags[]" value="{{$tag->id}}" checked>{{$tag->name}}<br> 
        @else
            <input type="checkbox" name = "tags[]" value="{{$tag->id}}">{{$tag->name}}<br> 
        @endif
    @empty
    @endforelse    

     <input type="submit" value="Сохранить"><br>
</form>
