<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class CategoriesAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.admin.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|min:8|max:128|unique:categories',
        ]);
        $data = $request->only([ 'slug', 'title', 'description' ]);
        Category::create($data);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.admin.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.admin.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'slug' => "required|min:8|max:128|unique:categories,slug,$id",
        ]);
        $category = Category::findOrFail($id);
        $data = $request->only(['slug', 'title', 'description']);
        $category->update($data);
        return redirect()->route('categories.show', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index');
    }

    public function trashList()
    {
        $categories = Category::onlyTrashed()->get();
        return view('categories.admin.trash', compact('categories'));
    }

    public function restore($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();
        return redirect()->route('categories.show', [ $category->id ]);
    }

    public function destroyForever($id)
    {
        $category = Category::onlyTrashed()->findOrFail($id)->forceDelete();
        return redirect()->route('categories.index');
    }
}
