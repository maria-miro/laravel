<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Index</title>
    </head>
    <body>
            <h1>Список новостей</h1><hr>

            @foreach ($articles as $article)
                <a href="/article/<?=$article['id']?>"><?=$article['title']?></a><hr>
            @endforeach
    
    </body>
</html>
