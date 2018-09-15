<?php

namespace App\Traits;

trait Sluggable {

    abstract public function sluggable(): string;

    public static function bootSluggable()
    {
        static::saving(function($model) {
            $sluggableField = $model->sluggable();
            $model->slug = $model->generateSlug($model[$sluggableField]);
        });
    }

    public function generateSlug($string)
    {
        return str_slug($string, '-');
    }

}