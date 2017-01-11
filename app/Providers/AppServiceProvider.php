<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
      
        $path = $request->path();
        $menu = Menu::handler('nav', ['id' => 'nav']); 

// items
$menu
    ->add('/', 'Главная')
    ->add('article/add', 'Новая статья')

    ->raw(null, null, ['class' => 'divider'])
    ->add('', 'Админ', Menu::items() 
        ->prefixParents() 
        ->add('/admin/articles', 'Статьи') // with prefix: /folders/urgent
        ->add('/admin/users', 'Пользователи')
    );

// styling
$menu
    ->addClass('nav navbar-nav')
    ->addId()
    ->getItemsByContentType(Menu\Items\Contents\Link::class)
    ->map(function($item) {
        if ( $item->isActive() )  {
            $item->addClass('active');
        }
    });
        View::share('menu', $menu);


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
