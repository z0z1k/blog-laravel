<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        DB::beforeExecuting(function($sql, $params){
            echo "<pre>";
            print_r($sql);
            print_r($params);
            echo "</pre>";
        });
    }
}
