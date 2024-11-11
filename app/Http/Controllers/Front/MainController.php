<?php

namespace App\Http\Controllers\Front;

use view;
use Carbon\Carbon;
use App\Models\Article;
use App\Models\Contact;
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
        $currentDateTime =  Carbon::now();
        $nows = Article::where([
            ['is_published', 1],
            ['is_updated', 1]
        ])->whereBetween('created_at', [Carbon::yesterday(), Carbon::now()])->with('category')->inRandomOrder()->limit(1)->get();

        // Get the first random article
        $first = Article::where([
            ['is_published', 1],
            ['is_updated', 1]
        ])->inRandomOrder()->first();

        // Get the most popular article (highest count)
        $popular = Article::where([
            ['is_published', 1],
            ['is_updated', 1]
        ])->orderBy('count', 'desc')->first();

        // dd($popular);
        // Get 5 random articles
        $randoms = Article::where([
            ['is_published', 1],
            ['is_updated', 1]
        ])->inRandomOrder()->take(4)->get();
        // dd($randoms);

        // Get the first 5 articles
        $limit = Article::with('user')->where([
            ['is_published', 1],
            ['is_updated', 1]
        ])->limit(6)->get();

        // Get all published and updated articles
        $articles = Article::where([
            ['is_published', 1],
            ['is_updated', 1]
        ])->get();

        // Get articles with specific IDs
        $five = Article::where([
            ['is_published', 1],
            ['is_updated', 1]
        ])->whereIn('id', [1, 2, 3, 4, 6])->get(); // IDs as integers

        // Get the first 5 categories with their articles
        // $cats = Category::with('articles')->inRandomOrder()->take(6)->get();
        $cats = Category::with(['articles' => function ($q) {
            $q->with('user') // Eager load the 'user' relationship
              ->where([
                  ['is_published', 1], // Ensure the article is published
                  ['is_updated', 1]    // Ensure the article is updated
              ])
              ->whereBetween('created_at', [Carbon::now()->subDays(4), Carbon::now()]) // Use an instance of Carbon
              ->limit(5); // Limit to 5 articles per category
        }])
        ->inRandomOrder() // Randomize the order of categories
        ->take(6) // Take 6 categories
        ->get();
        // dd($cats);
        // Get 4 articles from category with ID 4
        $news = Article::with('user')->where('category_id', 4)->inRandomOrder()->take(2)->get();
        // dd($news);
        // Pass all variables to the view
        return view('front.home.main', compact('nows', 'currentDateTime', 'first', 'popular', 'randoms', 'limit', 'articles', 'five', 'cats', 'news'));
    }

    public function news(Category $category)
    {
        $id = $category->id;
        $categorie = Article::with('user')
        ->where('category_id', $id)
        ->paginate(10);
        // dd($categorie);

        return view('front.home.cat', compact('categorie', 'category'));
    }

    public function show_article(Article $article)
    {
        $article->increment('count');


        return view('front.home.show_article', compact('article'));

    }


    public function showcontact()
    {
        return view('front.home.contact');
    }
    public function submitForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Create a new contact entry
        Contact::create($request->all());

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }

    public function login()
    {
        return view('front.home.login');
    }
    public function register()
    {
        return view('front.home.register');
    }



}
