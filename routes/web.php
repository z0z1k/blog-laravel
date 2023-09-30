<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Posts as PostsC;
use App\Http\Controllers\Videos as VideosC;
use App\Http\Controllers\Comments as CommentsC;
use App\Http\Controllers\Tags as TagsC;
use App\Http\Controllers\Blog;
use App\Http\Controllers\Profile\Password as ProfilePassword;

use App\Http\Controllers\Auth\Session;

Route::get('/', function(){return 'home';})->name('home');

Route::middleware('auth', 'verified')->prefix('admin')->group(function(){
    Route::resource('posts', PostsC::class)->parameters(['posts' => 'id']);
    Route::resource('videos', VideosC::class)->parameters(['videos' => 'id']);
    Route::resource('comments', CommentsC::class)->parameters(['comments' => 'id']);
    Route::resource('tags', TagsC::class)->parameters(['tags' => 'id']);

    Route::controller(ProfilePassword::class)->withoutMiddleware('verified')->prefix('profile')->group(function(){
        Route::get('/password', 'edit')->name('profile.password.edit');
        Route::put('/password', 'update')->name('profile.password.update');
    });
});

Route::get('/static/verify-email', function(){
    return 'please verify email';
})->name('verification.notice');

Route::controller(Blog::class)->group(function(){
    Route::get('/tag/{url}', 'tag')->name('blog.tag');
});

Route::controller(Session::class)->group(function(){
    Route::middleware('guest')->group(function(){
        Route::get('/auth/login', 'create')->name('login');
        Route::post('/auth/login', 'store')->name('login.store');
    });
    Route::middleware('auth')->group(function(){
        Route::get('/auth/logout', 'exit')->name('login.exit');
        Route::delete('/auth/logout', 'destroy')->name('login.destroy');
    });
});