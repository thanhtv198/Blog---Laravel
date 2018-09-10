<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Topic;
use App\Models\Tag;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('frontend.layouts.sidebar', function ($view) {
            $recentPost = Post::getRecent()
                ->paginate(config('blog.post.recent'));

            $topics = Topic::all();

            $tags = Tag::latest()
                ->take(config('blog.tag.limit'))
                ->get();

            $view->with(compact('recentPost', 'tags', 'topics'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
