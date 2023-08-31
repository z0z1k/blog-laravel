<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Posts as PostsC;
use App\Http\Controllers\Categories as CategoriesC;

Route::get('/posts', [ PostsC::class, 'index' ])->name('posts.index');
Route::get('/posts/create', [ PostsC::class, 'create' ])->name('posts.create');
Route::get('/posts/{id}', [ PostsC::class, 'show'])->name('posts.show.{id}');
Route::post('/posts', [ PostsC::class, 'store'])->name('posts.store');

Route::resource('categories', CategoriesC::class)->whereNumber(['category']);
Route::get('/categories/{slug}', [ CategoriesC::class, 'bySlug' ])->name('categories.byslug');