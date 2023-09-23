<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Posts as PostsC;
use App\Http\Controllers\Videos as VideosC;
use App\Http\Controllers\Comments as CommentsC;

Route::get('/', function(){return 'home';})->name('home');

Route::resource('posts', PostsC::class)->parameters(['posts' => 'id']);
Route::resource('videos', VideosC::class)->parameters(['videos' => 'id']);
Route::resource('comments', CommentsC::class)->parameters(['comments' => 'id']);