@extends ('base')

@section ('content')
<h1>Регистрация</h1>

    <form method="post">

     {{ csrf_field() }}
        @if (count($errors) > 0)
         <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        E-mail<br>
        <input type="email" name="email" size="80" value ="{{old('email')}}"><br>

        Имя пользователя<br>
        <input type="text" name="name" size="80" value ="{{old('name')}}"><br>

        Пароль<br>
        <input type="password" name="password" size="80" value =""><br>

        Пароль<br>
        <input type="password" name="password2" size="80" value =""><br>

         <input type="submit" value="Зарегистрироваться"><br>
    </form>
 @endsection  