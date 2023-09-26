<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tags\Store as StoreRequest;
use App\Http\Requests\Tags\Update as UpdateRequest;

use App\Models\Tag;

class Tags extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tags.index', [ 'tags' => Tag::all() ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $tag = Tag::create($data);
        return redirect()->route('tags.show', [ $tag->id ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tag = Tag::findOrFail($id);
        return view('tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::findOrFail($id);
        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $data = $request->validated();
        $tag = Tag::findOrFail($id);
        $tag->update($data);
        return redirect()->route('tags.show', [ $tag->id ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
