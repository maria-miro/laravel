@extends ('base')

@section ('content')

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="post">
         {{ csrf_field() }}

        Логин<br>
        <input type="email" name="email" value = "{{old('email')}}"><br>
        Пароль<br>
        <input type="password" name="password" value = ""><br>
        <input type="checkbox" name="remember" value = "{{old('remember')}}">Запомнить меня<br>
        <input type="submit" value="Войти"><br>
    </form>


@endsection

