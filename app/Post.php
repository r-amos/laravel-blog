<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    public function scopeFilters($query, $filters)
    {   
        if ($filters) {
            if ($filters['month']) {
                $query = $query
                    ->whereMonth(
                        'created_at', 
                        Carbon::parse($filters['month'])->month
                    );
            }
            if ($filters['year']) {
                $query = $query
                    ->whereYear(
                        'created_at',
                        $filters['year']
                    );
            }
        }
        return $query;
    }
}
