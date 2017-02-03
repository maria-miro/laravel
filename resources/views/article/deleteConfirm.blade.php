<form method="post">

 {{ csrf_field() }}
    Вы уверены, что хотите удалить {{$item}}? <br>
     <input type="submit" name ="confirm" value="Да">
     <input type="submit" name ="cancel" value="Нет">
</form>
