<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Posts as PostsC;
use App\Http\Controllers\CategoriesAdmin as CategoriesAdminC;
use App\Http\Controllers\Categories as CategoriesC;
use App\Http\Controllers\CommentsAdmin as CommentsAdminC;

Route::post('/posts/{id}/comment', [ PostsC::class, 'comment'])->name('posts.comment');
Route::resource('posts', PostsC::class)->parameters(['posts' => 'id']);

//middleware
Route::controller(CategoriesAdminC::class)->group(function(){
    Route::get('categories/trash', 'trashList')->name('categories.trash');
    Route::put('categories/{id}/restore', 'restore')->name('categories.restore');
    Route::delete('categories/{id}/destroy', 'destroyForever')->name('categories.remove');
});
Route::resource('categories', CategoriesAdminC::class)->parameters(['categories' => 'id']);


Route::get('/', [ CategoriesC::class, 'index' ])->name('home');
Route::get('/category/{slug}', [CategoriesC::class, 'show'])->name('category');

Route::resource('comments', CommentsAdminC::class)->parameters(['comments' => 'id']);
