<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Models\Post;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin-tags', function($user){
            return $user->roles()->where('name', 'admin')->count() > 0;
        });

        Gate::define('admin-users', function($user){
            return $user->roles()->where('name', 'admin')->count() > 0;
        });

        Gate::define('posts-create', function($user){
            return $user->roles()->where('name', 'writer')->count() > 0;
        });

        Gate::define('posts-edit', function($user, Post $post){
            return $user->roles()->where('name', 'writer')->count() > 0 && $user->id === $post->user_id;
        });
    }
}
