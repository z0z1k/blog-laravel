<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;

class Posts extends Controller
{
    public function index()
    {
        return view('posts.index', [ 'posts' => Post::all() ]);
    }

    public function show($id)
    {
        return view('posts.show', [ 'post' => Post::findOrFail($id) ]);
    }

    public function create()
    {
        $categories = Category::orderBy('title')->pluck('title', 'id');
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);
        $data = $request->only([ 'title', 'content' ]);
        Post::create($data);

        return redirect()->route('posts.index');
    }
}
