<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ValidateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // dd($user);

        if ($user->status == 'admin') {
            $articles = Article::paginate(15);
        } elseif ($user->status == 'writer') {
            $articles = Article::where('user_id', $user->id)->paginate(10);
        }
        // $articles = Article::paginate(10);
        // $categories = Category::all();
        // dd($articles);
        return view('Writer.articles.index', compact('articles', ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::all();
        $users = User::all();


        return view('Writer.articles.create', compact('categories', 'users'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidateArticleRequest $request)
    {

        $user = Auth::user();
        if ($user->status == 'admin') {
            $request->merge(['is_published' => '1']);
            $request->merge(['is_updated' => '1']);

        }

        // Create the slug from the title
        $slug = Str::slug($request->title_ar);
        // Check if the slug already exists
        $article = Article::where('slug', $slug)->first();
        if ($article) {
            $slug = $slug . '-' . $article->id;
        }
        $request->merge(['slug' => $slug, 'user_id' => $user->id]);
        // dd($request->all());

        // Create the article and exclude 'images' and 'videos' from the request data
        $article = Article::create(array_merge($request->except(['images', 'videos']), ['slug' => $slug]));

        // Handle images
        $images = $request->file('images');
        if ($images) {
            $smallImagesCount = $article->getMedia('small_images')->count();
            foreach ($images as $index => $image) {
                if ($index == 0) {
                    // First image goes to 'big_images' collection
                    $article->addMedia($image)->toMediaCollection('big_images');
                } else {
                    // Limit small images to a maximum of 5
                    if ($smallImagesCount < 5) {
                        $article->addMedia($image)->toMediaCollection('small_images');
                        $smallImagesCount++;
                    } else {
                        return redirect()->back()->withErrors(['images' => 'You can only upload up to 5 small images.']);
                    }
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
    public function show(Article $article)
    {
        $user = User::where('id', $article->user_id)->firstOr();
        return view('Writer.articles.show', compact('article'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();

        return view('Writer.articles.edit', compact('article', 'categories'));

    }

    public function update(ValidateArticleRequest $request, Article $article)
    {
        // Update the article's details
        $user = Auth::user();
        if ($user->status == 'admin') {
            $request->merge(['is_updated' => '1']);
        }
        if ($user->status == 'writer') {
            $request->merge(['is_updated' => '0']);
        }

        $slug = Str::slug($request->title_ar);

        $article->update(array_merge($request->all(), ['slug' => $slug]));
        // Handle image uploads
        if ($request->hasFile('images')) {
            // Clear existing media (optional)
            $article->clearMediaCollection('big_images');
            $article->clearMediaCollection('small_images');

            foreach ($request->file('images') as $index => $image) {
                if ($index === 0) {
                    // First image goes to 'big_images' collection
                    $article->addMedia($image)->toMediaCollection('big_images');
                } else {
                    // Add to 'small_images' collection
                    $article->addMedia($image)->toMediaCollection('small_images');
                }
            }
        }

        // Handle video uploads
        if ($request->hasFile('videos')) {
            // Clear existing media (optional)
            $article->clearMediaCollection('videos');

            foreach ($request->file('videos') as $video) {
                $article->addMedia($video)->toMediaCollection('videos');
            }
        }

        // Redirect or return a response
        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */

    public function view_softdelete()
    {

        $articles = Article::onlyTrashed()->paginate(10);
        return view('Writer.articles.softdelete', compact('articles'));
    }


    public function restore(string $id)
    {
        // dd("sdf");
        $article = Article::onlyTrashed()->findOrFail($id);
        $article->restore();
        return redirect('/articles')->with('status ', "restored done");

    }
    public function restoreall()
    {
        // dd("sdf");
        Article::onlyTrashed()->restore();
        return redirect('/articles')->with('status ', "restored done");

    }

    public function softdelete(string $id)
    {

        $article = Article::find($id);
        $article->delete();
        return  redirect()->back()->with('status ', "Soft deleted done");
    }

    public function destroy(string $id)
    {
        // dd("sdfasdf");
        $article = Article::findOrFail($id);
        $article->forceDelete();
        return redirect()->back()->with('status ', "deleted done");

    }


    public function togglePublish($id)
    {
        // dd($id);
        $article = Article::findOrFail($id);
        $article->is_published = !$article->is_published; // Toggle the value
        $article->save();

        if ($article->is_published == 1) {
            return redirect()->back()->with('status', 'published is done');
        }
        return redirect()->back()->with('status', 'unpublished is done');

    }

    public function toggleUpdate($id)
    {
        $article = Article::findOrFail($id);
        $article->is_updated = !$article->is_updated; // Toggle the value
        $article->save();

        if ($article->is_updated == 1) {
            return redirect()->back()->with('status', 'updated is done');
        }
        return redirect()->back()->with('status', 'unupdated is done');

    }

}
