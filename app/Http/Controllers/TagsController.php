<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;
use App\Post;

class TagsController extends Controller
{
    public function index(Tag $tag = null)
    {    
        if (is_null($tag)) {
            return Tag::all();
        }
        return view(
            'pages.posts', 
            [
                'posts' => Post::getPageItems($tag->posts->toArray()),

                'tag' => $tag->name
                
            ]
        );
    }

}
