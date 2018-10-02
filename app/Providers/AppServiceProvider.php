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
        // Make Topics Available In Sidepanel
        view()->composer('layouts.sidepanel', function($view) {
            $view->with('tags', \App\Tag::all()->pluck(['name']));
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
