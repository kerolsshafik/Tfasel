<?php

namespace App\Http\Controllers\Front;

use view;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        // Get the first article
        $first = Article::first();

        // Get random articles (this should be `inRandomOrder()`)
        $rendom = Article::inRandomOrder()->get(); // If you want a random selection, consider using `take()` to limit the number

        // Limit the results to 5 articles
        $limit = Article::limit(5)->get();

        // Get all articles
        $articles = Article::all();

        // Get articles where the IDs are in the specified array
        $five = Article::whereIn('id', ['1', '2', '3', '4', '5'])->get();

        // Get the first 5 categories with their articles
        $cat = Category::with('articles')->limit(5)->get(); // Correct the method call

        // Get articles from category with ID 4, limiting to 4 articles
        $news = Category::with('articles')->where('id', 4)->limit(4)->get(); // Corrected `limits` to `limit`

        return view('front.home.main', compact('articles'));

    }


    public function footer()
    {
        // Retrieve all categories
        $categories = Category::all();

        // Retrieve the first 2 articles
        $articles = Article::limit(2)->get();

        // Retrieve the first 5 media items for 'big_images' associated with the first article (or modify as needed)

        $galleries = Article::limit(6)->get();

        // Pass the data to the view
        return response()->json([
            'categories' => $categories,
            'articles' => $articles,
            'galleries' => $galleries,
        ]);
    }

}
