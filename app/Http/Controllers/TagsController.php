<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagsController extends Controller
{
    public function index(Tag $tag = null)
    {    
        if (is_null($tag)) {
            return Tag::all();
        }
        return $tag->posts;
    }
}
