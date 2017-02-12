<h1>Обратная связь</h1>

<form method="post">

 {{csrf_field()}}

   
    Имя<br>
    @foreach ($errors->get('name') as $message)
        <ul>
            <li class = "error">{{ $message }}</li>
        </ul>
    @endforeach
    <input type="text" name="name" size="80" value ="{{old('name')}}"><br>
    

    E-mail<br>
     @foreach ($errors->get('email') as $message)
        <ul>
            <li class = "error">{{ $message }}</li>
        </ul>
    @endforeach
    <input type="email" name="email" size="80" value ="{{old('email')}}"><br>

    Сообщение<br>
    @foreach ($errors->get('message') as $message)
        <ul>
            <li class = "error">{{ $message }}</li>
        </ul>
    @endforeach
    <textarea name="message"  cols="80" rows="10">{{old('message')}}</textarea><br>

     <input type="submit" value="Отправить"><br>
</form>
