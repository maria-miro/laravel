<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Menu;


class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('base', function ($view) {


            $menu = Menu::handler('nav', ['id' => 'nav']); 

            // items
            $menu
                ->add('/', 'Главная')
                ->add('article/add', 'Новая статья')

                ->raw(null, null, ['class' => 'divider'])
                ->add('', 'Админ', Menu::items() 
                    ->prefixParents() 
                    ->add('/admin/articles', 'Статьи') 
                    ->add('/admin/users', 'Пользователи')
                );

            // styling
            $menu
                ->addClass('nav navbar-nav')
                ->getItemsByContentType(Menu\Items\Contents\Link::class)
                ->map(function($item) {
                    if ( $item->isActive() )  {
                        $item->addClass('active');
                    }
                });
            $view->with('menu', $menu);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
