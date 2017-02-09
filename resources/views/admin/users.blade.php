<h1>Пользователи</h1><hr>
@if (count($users)>0)
<form class = "admin" method = "post" onSubmit="return confirm('Вы уверены, что хотите удалить пользователей? Удаляя пользователя, Вы удаляете все его статьи.')"> 
 {{ csrf_field() }}
	<table class = "admin">
	    <thead>
	    <tr>
	        <th>№</th>
	        <th>Пользователь</th>
	        <th>E-mail</th>
	        <th>Дата регистрации</th>
	        <th>Удалить</th>
	    </tr>
	    </thead>
	    <tbody>
			@foreach ($users as $key => $user)
				<tr>
			        <td>{{$key + 1}}</td>
			        <td>{{$user->name}}</td>
			        <td>{{$user->email}}</td>
			        <td class = "date">{{$user->created_at}}</td>
			        <td class = "checkbox"><input type="checkbox" name = "deletes[]" value="{{$user->id}}"> </td>
			    </tr>
			@endforeach
		</tbody>
	</table>

	<input type="submit" value="Удалить">
	</form>

@else
	<p>Нет пользователей</p>
@endif

