<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Article;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Share data with all views
        View::composer('*', function ($view) {
            $categories = Category::all();
            $articles = Article::limit(2)->get();
            $galleries = Article::limit(6)->get();

            // Share the data with the view
            $view->with(compact('categories', 'articles', 'galleries'));
        });
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
