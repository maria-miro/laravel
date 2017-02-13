<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Http\Models\Tag;
use App\Http\Models\Article;

class SidebarComposer
{
  /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('tags', Tag::all());
        
        $articles = Article::all();
        $randoms =  ($articles->count() > 3) ? $articles->random(3) : null;
        $view->with('randoms', $randoms);
    }
}
