<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //
        return view('dashboard.categories.index', [
            'title' => 'Categories',
            //'active' => 'categories',
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        return view('dashboard.categories.create', [
            'title' => 'Create Category',
            //'active' => 'categories',
            'category' => new Category()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:255|unique:categories|min:5',
            'slug' => 'required|max:255|unique:categories|min:5',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => $request->slug
        ]);

        return redirect('/dashboard/categories')->with('success', 'New category has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    //public function show(category $category)
    //{
        //
    //}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Category $category)
    {
        //
        return view('dashboard.categories.edit', [
            'title' => 'Edit Category',
            //'active' => 'categories',
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $request->validate([
            'name' => 'required|max:255|min:5',
            'slug' => 'required|max:255|min:5',
        ]);

        Category::where('id', $category->id)
            ->update([
                'name' => $request->name,
                'slug' => $request->slug
            ]);

        return redirect('/dashboard/categories')->with('success', 'Category has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        Category::destroy($category->id);
        return redirect('/dashboard/categories')->with('success', 'Category has been deleted!');
    }

    public function checkSlug(Request $request)
    {
        //$slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        $slug = Str::slug($request->name);
        return response()->json(['slug' => $slug]);
    }
}
