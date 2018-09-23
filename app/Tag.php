<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
        return $this->belongsToMany('App\Post')->orderBy('created_at', 'desc');
    }
    public function getRouteKeyName()
    {
        return 'name';
    }
    public static function getIdFromName($name)
    {        
        return self::where('name', $name)
            ->first()->id;
    }
}
