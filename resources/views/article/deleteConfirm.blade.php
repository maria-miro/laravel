@extends ('base')

@section ('content')
    <form method="post">

     {{ csrf_field() }}
        Вы уверены, что хотите удалить статью? <br>
         <input type="submit" name ="confirm" value="Да">
         <input type="submit" name ="cancel" value="Нет">
    </form>
 @endsection  
