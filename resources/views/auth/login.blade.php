<form method="post">
     {{ csrf_field() }}

    Логин/email<br>
     @foreach ($errors->get('email') as $message)
        <ul>
            <li class = "error">{{ $message }}</li>
        </ul>
    @endforeach
    <input type="email" name="email" value = "{{old('email', 'admin@admin.ru')}}"><br>
    Пароль<br>
    @foreach ($errors->get('password') as $message)
        <ul>
            <li class = "error">{{ $message }}</li>
        </ul>
    @endforeach
    <input type="password" name="password" value = ""><br>
    <input type="checkbox" name="remember" {{old('remember')?'checked':''}}>Запомнить меня<br>
    <input type="submit" value="Войти"><br>
</form>


