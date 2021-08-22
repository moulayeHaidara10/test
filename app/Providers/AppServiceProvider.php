<?php

namespace App\Providers;


use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\Categorie;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\Artiste;


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
        //

        $categories = Categorie::take(5)->get();

        view()->share('categories', $categories);

        $setting = Setting::first();
        view()->share('setting', $setting);

        $tags = Tag::take(5)->get();

        view()->share('tags', $tags);

        $artistes = Artiste::take(5)->get();

        view()->share('artistes', $artistes);

        $setting = \App\Models\Setting::first();
        paginator::useBootstrap();
        View()->share('recent_posts', \App\Models\Article::orderBy('id', 'desc')->limit('5')->get());
        View()->share('popular_posts', \App\Models\Article::orderBy('views', 'desc')->limit('5')->get());


    }
}
