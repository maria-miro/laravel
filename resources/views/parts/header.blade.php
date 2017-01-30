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
                <li><a href="{{route('home')}}">Главная</a></li>
                <li><a href="{{route('article.add')}}">Новая статья</a></li>
               
                @if (Auth::check())
                    <li>{{Auth::user()->name}} <a href="{{route('logout')}}">Выйти</a> </li> 
                @else
                    <li><a href="{{route('login')}}">Войти</a></li>
                     <li><a href="{{route('register')}}">Зарегистрироваться</a></li>
                @endif
                
                <li class="has-children"><a href="">Админ
                        <ul>
                     <li><a href="{{route('admin.articles')}}">Редактировать статьи</a></li>
                     <li><a href="{{route('admin.users')}}">Редактировать пользователей</a></li>                      
                  </ul>
                </li> 
            
            </ul> <!-- end #nav -->     
        </div> 

   </nav> <!-- end #nav-wrap -->         

</header> <!-- Header End -->