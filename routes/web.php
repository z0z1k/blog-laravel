<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Posts as PostsC;
use App\Http\Controllers\CategoriesAdmin as CategoriesAdminC;
use App\Http\Controllers\Categories as CategoriesC;

Route::resource('posts', PostsC::class)->parameters(['posts' => 'id']);
Route::get('/posts/create', [ PostsC::class, 'create' ])->name('posts.create');
Route::get('/posts/{id}', [ PostsC::class, 'show'])->name('posts.show.{id}');
Route::post('/posts', [ PostsC::class, 'store'])->name('posts.store');

//middleware
Route::controller(CategoriesAdminC::class)->group(function(){
    Route::get('categories/trash', 'trashList')->name('categories.trash');
    Route::put('categories/{category}/restore', 'restore')->whereNumber(['category'])->name('categories.restore');
    Route::delete('categories/{category}/destroy', 'destroyForever')->whereNumber(['category'])->name('categories.remove');
});
Route::resource('categories', CategoriesAdminC::class)->whereNumber(['category']);


Route::get('/', [ CategoriesC::class, 'index' ])->name('home');
Route::get('/category/{slug}', [CategoriesC::class, 'show'])->name('category');
