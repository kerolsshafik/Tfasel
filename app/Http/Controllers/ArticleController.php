<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $article = Article::all();

        return view('articles.index', compact('article'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        return view('articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'images' => 'required',
            'videos' => 'nullable',
            'images.*' => 'file|mimes:jpg,jpeg,png,gif|max:10240', // Images up to 10MB
            'videos.*' => 'nullable|file|mimes:mp4,avi,mov|max:51200', // Videos up to 50MB

        ]);
        // create all without images ,videos
        $slug = Str::slug($request->title);

        // Create the article and exclude 'images' and 'videos' from the request data
        $article = Article::create(array_merge($request->except(['images', 'videos']), ['slug' => $slug]));

        // get array of images

        $images = $request->file('images');

        // get array of videos
        $videoFiles = $request->file('videos');

        dd($images, $videoFiles);

        if ($images) {
            //doing for as images is array
            foreach ($images as $index => $image) {
                // If it's the first image, add it to the 'big' media collection
                if ($index == 0) {
                    $article->addMedia($image)
                        ->toMediaCollection('big_images');
                } else {
                    // Add the rest of the images to the 'small_images' media collection
                    $article->addMedia($image)
                        ->toMediaCollection('small_images');
                }
            }
        }
        // upload videos will get array of videos
        if ($videoFiles) {

            foreach ($videoFiles as $file) {
                $article->addMedia($file)
                    ->toMediaCollection('videos');
            }
        }

        return redirect('/articles')->with('status', 'Article created successfully with images and videos');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::findOrFail($id);

        return view('articles.show', compact('article'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);

        return view('articles.edit', compact('article'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);
        $article = Article::find($id);
        $article->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */

    public function softdelete()
    {

        $articles = Article::onlyTrashed()->get();
        return view('articles.softdelete', compact('articles'));

    }
    public function destroy(string $id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect('/articles')->with('state ', "deleted done");
    }
}
