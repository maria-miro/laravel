<header id="top">
  
    <div class="row">

        <div class="header-content twelve columns">

              <h1 id="logo-text"><a href="{{route('home')}}" title="">Maria's blog</a></h1>
                <p id="intro">My first blog on Laravel  </p>
        </div>          

    </div>

   <nav id="nav-wrap"> 

        <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show Menu</a>
        <a class="mobile-btn" href="#" title="Hide navigation">Hide Menu</a>

        <div class="row">                       
          <div class="six columns">
            <ul id="nav" class="nav">
                <li class = "home"><a href="{{route('home')}}">Главная</a></li>
                <li class = "add"><a href="{{route('article.add')}}">Новая статья</a></li>
                <li class="has-children admin"><a href="">Админ
                        <ul>
                     <li><a href="{{route('admin.articles')}}">Редактировать статьи</a></li>
                     <li><a href="{{route('admin.users')}}">Редактировать пользователей</a></li>                      
                  </ul>
                </li>  
            </ul> <!-- end #nav -->  
            </div>
       <div  class="six columns">
            <ul id="auth" class="nav">
               
                @if (Auth::check())
                    <li class = "login">Здравствуйте, {{Auth::user()->name}} <a href="{{route('logout')}}">Выйти</a> </li> 
                @else
                    <li class = "login"><a href="{{route('login')}}">Войти</a></li>
                     <li class = "register"><a href="{{route('register')}}">Регистрация</a></li>
                @endif

            </ul> <!-- end #auth -->   
          </div>
   
        </div> 

   </nav> <!-- end #nav-wrap -->         

</header> <!-- Header End -->