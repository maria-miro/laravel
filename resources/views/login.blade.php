@extends ('base')

@section ('content')

    <form method="post">
        Логин<br>
        <input type="text" name="login" value = ""><br>
        Пароль<br>
        <input type="password" name="password" value = ""><br>
        <input type="checkbox" name="remember">Запомнить меня<br>
        <input type="submit" value="Войти"><br>
    </form>


@endsection

