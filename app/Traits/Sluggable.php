<?php

namespace App\Traits;
use Illuminate\Support\Facades\DB;
trait Sluggable {

    abstract public function sluggable(): string;

    public static function bootSluggable()
    {
        static::saving(function($model) {
            $sluggableField = $model->sluggable();
            $slug = $model->generateSlug(
                $model[$sluggableField]
            );
            $noOfInstances = $model
                ->getNoOfInstances($model[$sluggableField]);
            if ($noOfInstances > 0) {
                $noOfInstances++;
                $slug = "{$slug}-{$noOfInstances}";
            } 
            $model->slug = $slug;
        });
    }

    public function getNoOfInstances($slug)
    { 
        return DB::table($this->getTable())
            ->where($this->sluggable(), $slug)
            ->count();
    }

    public function generateSlug($string)
    {
        return str_slug($string, '-');
    }

}