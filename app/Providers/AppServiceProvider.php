<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        Schema::defaultStringLength(256);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Gate::define('edit', function ($user, $post) {
            return $user->id == $post->user_id;
        });
    
        Gate::define('update', function ($user, $post) {
            return $user->id == $post->user_id;
        });
    
        Gate::define('destroy', function ($user, $post) {
            return $user->id == $post->user_id;
        });
        Gate::define('show', function ($user, $post) {
            return $user->id == $post->user_id;
        });
    }
}
