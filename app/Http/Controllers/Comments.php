<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Http\Requests\Comments\Add as AddRequest;
use App\Http\Requests\Comments\Update as UpdateRequest;

use App\Models\Post;
use App\Models\Video;
use App\Models\Comment;

class Comments extends Controller
{
    const FOR_MODELS = [
        'post' => Post::class,
        'video' => Video::class,
    ];

    const MODELS_REDIRECT = [
        Post::class => 'posts.show',
        Video::class => '',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddRequest $request)
    {
        $modelName = self::FOR_MODELS[$request->for];
        $model = $modelName::findOrFail($request->id);

        $model->comments()->create($request->only(['text']));

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->update($request->validated());
        session()->flash('notification', 'comments.updated');
        return redirect()->route('posts.show', [ $comment->comentable_id ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
