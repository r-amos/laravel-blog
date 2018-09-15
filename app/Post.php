<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Traits\Sluggable;
class Post extends Model
{
    
    use Sluggable;

    const SLUG_FIELD = 'title';

    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];   

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
    
    public function sluggable()
    {
        return self::SLUG_FIELD;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
