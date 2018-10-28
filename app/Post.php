<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;
use App\Traits\Sluggable;
use App\Traits\Paginatable;

class Post extends Model
{
    
    use Sluggable;
    use Paginatable {
        getPageItems as getPaginatedPostItems;
    }

    const SLUG_FIELD = 'title';
    const PAGE_LIMIT = 5;

    protected $fillable = [
        'title',
        'description',
        'content',
        'user_id',
        'tags',
        'slug',
        'created_at'
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

    public function convertMarkdownContent()
    {
        $this->content = (new \Parsedown())
            ->setMarkupEscaped(true)
            ->text($this->content);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function getPageItems($items) {
        return self::getPaginatedPostItems($items)->withPath('posts');
    }

    public function formattedDate()
    {
        return $this->created_at->format('F jS, Y');
    }
    public function createTagsRelationship($tags)
    {
        $tagIdentifiers = array_map(function($tag){
            return Tag::getIdFromName($tag);
        }, $tags);
        $this->tags()->attach($tagIdentifiers);
    }

    public static function getLatestPost() {
        return self::all()->last();
    }

    public static function getLatestPosts($noOfPosts) {
        return self::orderBy('created_at', 'desc')->take($noOfPosts)->get();
    }
    
    /**
     * Return An Array Of Tag Ids From An Array Of Tag Names.
    *
    * @param [type] $tags
    * @return void
    */    
    public function updateTagsRelationship($tags): void
    {
        // Map $tags Array To Ids
        $this->tags()->sync(
            array_map(function($tag) {
                return Tag::getIdFromName($tag);
            }, $tags)
        );
    }
}
