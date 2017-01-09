@extends ('base')

@section ('content')

    <form method="post">
         {{ csrf_field() }}

        Логин<br>
        <input type="text" name="login" value = "{{old('title')}}"><br>
        Пароль<br>
        <input type="password" name="password" value = "{{old('content')}}"><br>
        <input type="checkbox" name="remember">Запомнить меня<br>
        <input type="submit" value="Войти"><br>
    </form>


@endsection

