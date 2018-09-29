<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Post;
use App\Tag;

/**
 * PostsController class responsible for handling requests
 * for Post Models. 
 * 
 * PostsController class contains the logic responsible for handling
 * create, read, update and delete requests in relation to a Post or
 * collection of Posts. 
 */
class PostsController extends Controller
{

    const PAGE_LIMIT = 5;

    /**
     * Constructs PostController instance
     * 
     * Contstructor function is responsible for creating and returning a PostsController instance
     * along with assigning the authentication middleware to the 'create' and 'store' actions.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')
            ->only('create', 'store');
    }

    /**
     * Return Posts View with Pagination Posts Data
     * 
     * Gets a collection of Posts, with Tags relationship populated, ordered by the latest
     * with an optional filter of the month and / or of interest applied. The collection
     * is converted to an array, and passed to Post::getPageItems, the result
     * of which is passed to as the data to the 'pages.posts' view.
     *
     * @return Illuminate\View\View
     */
    public function index(): Illuminate\View\View
    {                  
        return view(
            'pages.posts',
            [
                'posts' => Post::getPageItems(
                    Post::with('tags')
                        ->latest()
                        ->filters(request(['month', 'year']))
                        ->get()
                        ->toArray()
                )
            ]
        );
    }

    /**
     * Returns post view
     *
     * For a specific Post provided, calls Post->convertMarkdownContent
     * and passes as data to the 'pages.post' view.
     * 
     * @param Post $post
     * @return Illuminate\View\View
     */
    public function show(Post $post): Illuminate\View\View
    {
        $post->convertMarkdownContent();
        return view('pages.post', compact('post'));
    }

    public function create()
    {
        return view('pages.create-post', [
            'tags' => \App\Tag::all()->pluck(['name'])
        ]);
    }

    public function store(Request $request)
    {                
        (Post::create([
            'title' => $request['blog-title'],
            'description' => $request['blog-description'],
            'content' => $request['blog-content'],
            'user_id' => auth()->id()
        ]))
            ->createTagsRelationship($request['blog-topic']);
        return redirect('/posts');
    }

    public function edit(Post $post)
    {
        return view('pages.edit-post', [
            'post' => $post,
            'tags' => \App\Tag::all()->pluck(['name'])
        ]);
    }

    public function update(Post $post, Request $request)
    {   

        // Update Post With Request Data.
        $post->title = $request['blog-title'];
        $post->description = $request['blog-description'];
        $post->content = $request['blog-content'];
        $post->save();
        
        // Update Tags Relationship
        $post->updateTagsRelationship($request['blog-topic']);

        // Redirect
        $slug = $post->slug;
        return redirect("/posts/{$slug}");

    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect("/posts");
    }

    private function getPaginationStart($currentPage)
    {
        return (self::PAGE_LIMIT * $currentPage) - self::PAGE_LIMIT;
    }
}
