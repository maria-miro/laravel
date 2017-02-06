<!-- Поиск  -->

<div class="widget widget_search">
   <h3>Search</h3> 
   <form action="#">
      <input type="text" value="Поиск пока не работает..." onblur="if(this.value == '') { this.value = 'Search here...'; }" onfocus="if (this.value == 'Search here...') { this.value = ''; }" class="text-search">
      <input type="submit" value="" class="submit-search">
   </form>
</div>

<!-- Теги  -->

<div class="widget widget_tags">
   <h3>Теги</h3>
   <div class="tagcloud group">
      @foreach ($tags as $tag)
         <a href="{{route('article.listByTag', ['tagId' => $tag->id])}}">{{$tag->name}}</a>
      @endforeach
   </div>     
</div>

<!-- Случайные статьи -->

<div class="widget widget_popular">
   <h3>Случайные статьи</h3>
   <ul class="link-list">
     @foreach ($randoms as $random)
         <li><a href="{{route('article.one', ['id' => $random->id])}}">{{$random->title}}</a></li>                          
      @endforeach
   </ul>      
</div>
