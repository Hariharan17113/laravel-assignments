<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\tags;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function($view){
            $view->with('posts', \App\Models\Post::latestPosts());
        });
        view()->composer('layouts.sidebar', function($view){
            $view->with('users', \App\Models\User::users());
        });
        view()->composer('layouts.graph', function($view){
            $view->with('datas', \App\Models\User::graph());
            $view->with('posts', \App\Models\Post::graph());
        });
        view()->composer('layouts.postVsTimelineGraph', function($view){
            $view->with('datas', \App\Models\User::graphByYear());
            $view->with('posts', \App\Models\Post::graphByYear());
        });
        view()->composer('layouts.sidebar', function($view){
            $count_tags=tags::withCount('posts')->orderBy('posts_count','desc')->get();
            $view->with('count_tags', $count_tags);
        });
        Paginator::useBootstrap();

    }
}
