<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\Save as SaveRequest;
use Illuminate\Support\Facades\Gate;

use App\Models\Post;
use App\Models\Tag;
use App\Enums\Post\Status as PostStatus;

class Posts extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::withCount('comments')->orderByDesc('created_at')->get(),
            'tags' => Tag::orderbyDesc('title')->pluck('title', 'id'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create', [
            'tags' => Tag::orderByDesc('title')->pluck('title', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveRequest $request)
    {
        Gate::authorize('posts-create');
        $data = $request->validated();
        $post = Post::create($data + [ 'user_id' => $request->user()->id ]);
        
        $post->tags()->sync($data['tags']);
        
        return redirect()->route('posts.show', [ $post->id ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        Gate::authorize('posts-edit', $post);
        $tags = Tag::orderByDesc('title')->pluck('title', 'id');
        return view('posts.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveRequest $request, string $id)
    {
        $data = $request->validated();
        $post = Post::findOrFail($id);
        $post->update($data);

        $post->tags()->sync($data['tags']);

        return redirect()->route('posts.show', [ $post->id ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function approve($id)
    {
        $post = Post::findOrFail($id);
        $post->status = PostStatus::APPROVED;
        $post->save();
    }
}
