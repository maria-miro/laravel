<!DOCTYPE html>
<html lang="en">
    <head>
        <title> {{$title or 'Blog'}} </title>

    </head>
    <body>

        <header>
        <p>Menu</p>

        </header>
        
        <div class  = "mainContent">
            @section ('content')

            @show    
        </div>

        <footer>
            <p>footer</p>
        </footer>
    
    </body>
</html>
