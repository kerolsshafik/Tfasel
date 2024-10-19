<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = Category::paginate(10);

        return view('admin.category.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }


    // public function show($id)
    // {
    //     $cat = Category::find($id);
    //     if (app()->getLocale() == 'ar') {
    //         $name = $cat->name_ar;
    //     } else {
    //         $name = $cat->name_en;
    //     }

    //     return view('categories.show', compact('cat'));

    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name_ar' => 'required|min:3',
            'name_en' => 'required|min:3',

        ]);
        $slug = Str::slug($request->name_ar);

        // dd($request->all());
        Category::create([
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'slug' => $slug,
        ]);

        return redirect('/categories')->with('status ', "created done");

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $caregory = Category::find($id);
        return view('admin.category.edit', compact('caregory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd("sdf");
        $request->validate([
            'name_ar' => 'required|min:3',
            'name_en' => 'required|min:3',
        ]);
        $cat = Category::find($id);
        $slug = Str::slug($request->name_ar);
        $cat->update(array_merge($request->all(), ['slug' => $slug]));

        // $cat->update([
        //     'name_ar' => $request->name_ar,
        //     'name_en' => $request->name_en,
        //     'slug' => $slug,
        // ]);
        return redirect('/categories')->with('status ', "updated done");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd("dfghd");
        $cat = Category::findOrFail($id);
        $cat->delete();
        return redirect('/categories')->with('status ', "deleted done");
    }
}
