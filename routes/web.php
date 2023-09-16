<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Posts as PostsC;
use App\Http\Controllers\Comments as CommentsC;

Route::resource('posts', PostsC::class)->parameters(['posts' => 'id']);
Route::resource('comments', CommentsC::class)->parameters(['comments' => 'id']);
