@extends ('base')

@section ('content')
<h1>Регистрация</h1>

    <form method="post">

     {{ csrf_field() }}
        E-mail<br>
         @foreach ($errors->get('email') as $message)
            <ul>
                <li>{{ $message }}</li>
            </ul>
        @endforeach
        <input type="email" name="email" size="80" value ="{{old('email')}}"><br>
       
        Имя пользователя<br>
        @foreach ($errors->get('name') as $message)
            <ul>
                <li>{{ $message }}</li>
            </ul>
        @endforeach
        <input type="text" name="name" size="80" value ="{{old('name')}}"><br>
        
        Пароль<br>
        @foreach ($errors->get('password') as $message)
            <ul>
                <li>{{ $message }}</li>
            </ul>
        @endforeach
        <input type="password" name="password" size="80" value =""><br>
        
        Пароль<br>
        @foreach ($errors->get('password2') as $message)
            <ul>
                <li>{{ $message }}</li>
            </ul>
        @endforeach
        <input type="password" name="password2" size="80" value =""><br>
        
         <input type="submit" value="Зарегистрироваться"><br>
    </form>
 @endsection  