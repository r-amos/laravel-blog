<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    
    public function boot()
    {
        // Make Tags Available In Sidepanel
        view()->composer('pages.posts', function($view) {
            $view->with('tags', \App\Tag::all());
        });
        // SVG Directive For Use In Blade Templates
        Blade::directive('svg', function ($svg) {
            $file = public_path() . "/svg/{$svg}.svg";
            return file_get_contents($file);
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
