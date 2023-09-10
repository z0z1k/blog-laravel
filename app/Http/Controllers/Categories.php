<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;

class Categories extends Controller
{
    public function index()
    {
        return view('categories.index');
    }

    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('categories.show', compact('category'));
    }
}