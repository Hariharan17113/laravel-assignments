<?php

namespace App\Providers;

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
        });
        view()->composer('layouts.postVsTimelineGraph', function($view){
            $view->with('posts', \App\Models\Post::graph());
        });
        view()->composer('layouts.sidebar', function($view){
            $tags = DB::table('post_tag')
                ->join('tags','tags.id',"=",'post_tag.tag_id')
                ->join('posts','posts.id',"=",'post_tag.post_id')
                ->get();

            $count_tags=[];
            $countTags = $tags->where('tags','Python')->count();
            $TotalTagCount = array('name' => 'Python', 'count' => $countTags,);
            array_push($count_tags,$TotalTagCount);
            $countTags = $tags->where('tags','C')->count();
            $TotalTagCount = array('name' => 'C', 'count' => $countTags,);
            array_push($count_tags,$TotalTagCount);
            $countTags = $tags->where('tags','C++')->count();
            $TotalTagCount = array('name' => 'C++', 'count' => $countTags,);
            array_push($count_tags,$TotalTagCount);
            $countTags = $tags->where('tags','PHP')->count();
            $TotalTagCount = array('name' => 'PHP', 'count' => $countTags,);
            array_push($count_tags,$TotalTagCount);
            $count_tags=collect($count_tags)->sortBy('count')->reverse()->toArray();

            $view->with('count_tags', $count_tags);
        });



    }
}
