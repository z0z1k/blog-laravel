<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Posts;

Route::get('/posts', [ Posts::class, 'index' ]);
Route::get('/posts/create', [ Posts::class, 'create' ]);
Route::get('/posts/{id}', [ Posts::class, 'show']);
Route::post('/posts', [ Posts::class, 'store']);