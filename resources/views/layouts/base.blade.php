<!DOCTYPE html>
<html lang="en">
    <head>
        <!--- Basic Page Needs
   ================================================== -->
       <meta charset="utf-8">
        <title>{{$title or 'Blog'}}</title>
        <meta name="description" content="">  
        <meta name="author" content="">

        <!-- mobile specific metas
       ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

       <!-- CSS
        ================================================== -->
        <link rel="stylesheet" href="/css/custom.css">  
        <link rel="stylesheet" href="/css/default.css">
        <link rel="stylesheet" href="/css/layout.css">  
        <link rel="stylesheet" href="/css/media-queries.css"> 
        @section('head_styles')
        @show

       <!-- Script
       ================================================== -->
        <script src="/js/modernizr.js"></script>
        @section('head_scripts')
        @show

       <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="favicon.png" >

    </head>

    <body>
    @section('header')
    @show

    @section('content')
    @show

    @section('footer')
    @show

    @section('bottom_scripts')
    @show
    
    </body>
</html>
