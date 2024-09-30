<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
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

        $category = Category::all();
        return view('articles.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);
        $article = Article::create($request->all());
        return redirect('/articles')->with('state ', "created done");


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
