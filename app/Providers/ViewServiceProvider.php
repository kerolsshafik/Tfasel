<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer(['front.layout.app', 'front.layout.footer'], function ($view) {
            // View::composer('front.layout.*', function ($view) {
            $currentDateTime =  Carbon::now();

            $categories = Category::all();

            $nows = Article::where([
                ['is_published', 1],
                ['is_updated', 1]
            ])->whereBetween('created_at', [Carbon::yesterday(), Carbon::now()])->with('category')->inRandomOrder()->limit(1)->get();

            $articles = Article::where([
                ['is_published', 1],
                ['is_updated', 1]
            ])->with('category')->limit(2)->get();
            $galleries = Article::where([
                ['is_published', 1],
                ['is_updated', 1]
            ])->limit(6)->get();
            // Share the data with the view
            $view->with(compact('categories', 'articles', 'galleries', 'currentDateTime', 'nows'));
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
