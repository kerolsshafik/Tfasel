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
            'title_ar' => 'required',
            'title_en' => 'required',
            'content_ar' => 'required',
            'content_en' => 'required',
            'category_id' => 'required',
            'images' => 'required',
            'videos' => 'nullable',
            'images.*' => 'file|mimes:jpg,jpeg,png,gif|max:10240', // Images up to 10MB
            'videos.*' => 'nullable|file|max:51200', // Videos up to 50MB
        ]);

        // Create the slug from the title
        $slug = Str::slug($request->title);

        // Create the article and exclude 'images' and 'videos' from the request data
        $article = Article::create(array_merge($request->except(['images', 'videos']), ['slug' => $slug]));

        // // // Handle images
        // Handle images
        $images = $request->file('images');
        if ($images) {
            foreach ($images as $index => $image) {
                // Set the path based on whether it's the first image or not
                if ($index == 0) {
                    $article->addMedia($image)->toMediaCollection('big_images');
                } if ($article->getMedia('small_images')->count() < 5) {
                    $article->addMedia($image)->toMediaCollection('small_images');
                } else {
                    return redirect()->back()->withErrors(['images' => 'You can only upload up to 5 small images.']);
                }
            }
        }

        // Handle videos
        $videoFiles = $request->file('videos');
        if ($videoFiles) {
            foreach ($videoFiles as $file) {
                $article->addMedia($file)->toMediaCollection('videos');
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

        // if (app()->getLocale() == 'ar') {
        //     $title = $article->title_ar;
        //     $content = $article->content_ar;
        // } else {
        //     $title = $article->title_en;
        //     $content = $article->content_en;
        // }

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

        // $request->validate([
        //     'title' => 'required',
        //     'body' => 'required',
        //     'category_id' => 'required',
        // ]);
        // $article = Article::find($id);
        // $article->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     */

    public function restore(string $id)
    {

        $article = Article::onlyTrashed()->findOrFail($id);
        $article->restore();
        return redirect('/articles')->with('state ', "restored done");

    }
    public function softdelete(string $id)
    {

        $article = Article::find($id);
        $article->delete();
        return redirect('/articles')->with('state ', "deleted done");
    }
    public function destroy(string $id)
    {

        $article = Article::onlyTrashed()->findOrFail($id);
        $article->forceDelete();
        return redirect('/articles')->with('state ', "deleted done");

    }

}
