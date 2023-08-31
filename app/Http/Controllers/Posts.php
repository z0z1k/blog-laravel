<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

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
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->only([ 'title', 'content' ]);
        Post::create($data);

        return redirect()->route('posts.index');
    }
}
