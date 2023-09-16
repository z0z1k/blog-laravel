<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;

class Posts extends Controller
{
    public function index()
    {
        return view('posts.index', [ 'posts' => Post::recent() ]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments()->orderByDesc('created_at')->get();
        return view('posts.show', compact('post', 'comments'));
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
        $data = $request->only([ 'title', 'content', 'category_id' ]);
        Post::create($data);

        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::orderBy('title')->pluck('title', 'id');
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);

        $data = $request->only([ 'title', 'content', 'category_id' ]);
        Post::findOrFail($id)->update($data);
        return redirect()->route('posts.index');
    }

    public function comment(Request $request, $id)
    {
        $request->validate([
            'text' => 'required|max:256',
        ]);
        $data = $request->only('text') + ['post_id' => $id];
        Comment::create($data);

        return redirect()->route('posts.show', $id);
    }
}
