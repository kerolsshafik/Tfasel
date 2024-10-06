<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cat = Category::all();

        return view('categories.index', compact('cat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }


    public function show($id)
    {
        $cat = Category::find($id);
        if (app()->getLocale() == 'ar') {
            $name = $cat->name_ar;
        } else {
            $name = $cat->name_en;
        }

        return view('categories.show', compact('name'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
        ]);
        $cat = Category::create($request->all());
        return redirect('/categories')->with('state ', "created done");

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cat = Category::find($id);
        return view('categories.edit', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => 'required',
        ]);
        $cat = Category::find($id);
        $cat->update($request->all());
        return redirect('/categories')->with('state ', "updated done");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat = Category::findOrFail($id);
        $cat->delete();
        return redirect('/categories')->with('state ', "deleted done");
    }
}
