<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Video;
use App\Models\VideoRequest;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
        Schema::defaultStringLength(191);

        View::composer(['layouts.categoriesHeader', 'main.video'], function ($view) {
            $view->with('categories', Category::all());
        });


        View::composer(['admin.partials.header', 'admin.partials.aside'], function ($view) {
            $view->with('requests', VideoRequest::query()->whereNull('seen')->get());
        });

        View::composer(['admin.partials.header', 'admin.partials.aside'], function ($view) {
            $view->with('comments', Comment::query()->where('status', 0)->get());
        });

        View::composer(['main.partials._popularPosts'], function ($view) {
            $view->with('populars', Video::query()->orderBy('view', 'DESC')->take(3)->get());
        });
    }
}
