<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Posts;

Route::get('/posts', [Posts::class, 'index']);