<h1>Статьи</h1><hr>
@if (count($articles)>0)
<form class = "admin" method = "post" onSubmit="return confirm('Вы уверены, что хотите удалить статьи?')"> 
 {{ csrf_field() }}
	<table class = "admin">
	    <thead>
	    <tr>
	        <th>№</th>
	        <th>Статья</th>
	        <th>Автор</th>
	        <th>Удалить</th>
	    </tr>
	    </thead>
	    <tbody>
			@foreach ($articles as $key => $article)
				<tr>
			        <td>{{$key + 1}}</td>
			        <td><a href = "/article/{{$article['id']}}/edit/">{{$article->title}}</a> </td>
			        <td>{{$article->user->name}}</td>
			        <td class = "checkbox"><input type="checkbox" name = "deletes[]" value="{{$article->id}}"> </td>
			    </tr>
			@endforeach
		</tbody>
	</table>

     <input type="submit" value="Удалить">
</form>


@else
	<p>Нет новостей для отображения</p>
@endif