<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * TagsController class responsible for handling requests
 * for Tag Models.
 *
 * TagsController class contains the logic responsible for handling
 * create, read, update and delete requests in relation to a Tag or
 *  collection of Tags.
 */
class TagsController extends Controller
{
    /**
     * Return all tags or filtered posts
     * 
     * Checks for a specific tag being provided and returns 
     * posts view with the related Post models as data for those
     * that are related. If not tag provided, returns all Tags
     *
     * @param Tag $tag
     * @return \Illuminate\View\View | \Illuminate\Http\RedirectResponse
     */
    public function index(Tag $tag = null): object
    {
        // If not tag id provided in URL and user authenticated, return Tag Creation
        if (is_null($tag) && Auth::check()) {
            return view(
                'pages.tags',
                ['tags' => Tag::all()]
            );
        }
        // If Tag Provide, get related Posts
        if (!is_null($tag)) {
            return view(
                'pages.posts',
                [
                    'posts' => Post::getPageItems($tag->posts->toArray()),
                    'tag' => $tag->name,
                ]
            );
        }
        // Else, redirect home
        return redirect('/');
    }

    /**
     * Store new Tag
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        Tag::create([
            'name' => $request['name']
        ]);
        return redirect('/tags');
    }
    /**
     * Delete Tag & return tags view
     *
     * @param Tag $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Tag $tag):  \Illuminate\Http\RedirectResponse
    {
        $tag->delete();
        return redirect('/tags');
    }
    
}
