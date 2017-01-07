<!DOCTYPE html>
<html lang="en">
    <head>
        <title> {{$title or 'Blog'}} </title>

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
       <link rel="stylesheet" href="/css/default.css">
        <link rel="stylesheet" href="/css/layout.css">  
        <link rel="stylesheet" href="/css/media-queries.css"> 

       <!-- Script
       ================================================== -->
        <script src="/js/modernizr.js"></script>

       <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="favicon.png" >

    </head>



    <body>

        <!-- Header
   ================================================== -->
   <header id="top">

    <div class="row">

        <div class="header-content twelve columns">

              <h1 id="logo-text"><a href="index.html" title="">Maria's blog</a></h1>
                <p id="intro">My first blog on Laravel  </p>

            </div>          

       </div>

       <nav id="nav-wrap"> 

        <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show Menu</a>
           <a class="mobile-btn" href="#" title="Hide navigation">Hide Menu</a>

        <div class="row">                       

                <ul id="nav" class="nav">
                    <li  
                    @if ($path == "/" )
                        class = "current"
                    @endif
                    ><a href="/">Главная</a></li>
                    <li 
                    @if ($path == "article/add" )
                        class = "current"
                    @endif
                    ><a href="/article/add">Новая статья</a></li>
                    <li>
                    @if ($auth)
                       <a href="/logout">Выйти</a> 
                    @else
                        <a href="/login">Войти</a> 
                    @endif
                    </li>  


                </ul> <!-- end #nav -->     
             
            

        </div> 

       </nav> <!-- end #nav-wrap -->         

   </header> <!-- Header End -->
        
    <div id="content-wrap">

        <div class="row section-head">

            <div id="main" class="twelve columns">
 
            @section ('content')

            @show    
       
            </div> <!-- end main -->


        </div> <!-- end row -->



   </div> <!-- end content-wrap -->     

        <!-- Footer
   ================================================== -->
   <footer>

      <div class="row"> 

        <div class="twelve columns">    
                <ul class="social-links">
               <li><a href="#"><i class="fa fa-facebook"></i></a></li>
               <li><a href="#"><i class="fa fa-twitter"></i></a></li>
               <li><a href="#"><i class="fa fa-google-plus"></i></a></li>               
               <li><a href="#"><i class="fa fa-github-square"></i></a></li>
               <li><a href="#"><i class="fa fa-instagram"></i></a></li>
               <li><a href="#"><i class="fa fa-flickr"></i></a></li>               
               <li><a href="#"><i class="fa fa-skype"></i></a></li>
            </ul>           
        </div>



         <p class="copyright">&copy; Copyright 2016 Maria Miroshnichenko. &nbsp; Design by <a title="Styleshout" href="http://www.styleshout.com/">Styleshout</a>.</p>
        
      </div> <!-- End row -->

      <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#top"><i class="fa fa-chevron-up"></i></a></div>

   </footer> <!-- End Footer-->


   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="/js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="/js/jquery-migrate-1.2.1.min.js"></script>  
   <script src="/js/main.js"></script>
    
    </body>
</html>
