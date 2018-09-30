<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

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

    /**
     * Define the number of posts per page to be used in pagination
     */
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
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
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
                ),
            ]
        );
    }

    /**
     * Returns post view
     *
     * For a specific Post provided, calls Post->convertMarkdownContent
     * and passes the convertedc (makrdown to html) data to the 'pages.post' view.
     *
     * @param Post $post
     * @return \Illuminate\View\View
     */
    public function show(Post $post): \Illuminate\View\View
    {
        $post->convertMarkdownContent();
        return view('pages.post', compact('post'));
    }
    /**
     * Return Post Creation View
     *
     * Return the post creation view, along with an array of datat
     * 'tags' which contains the tags available for associating to
     * a created post.
     *
     * @return \Illuminate\View\View
     */
    public function create(): \Illuminate\View\View
    {
        return view('pages.create-post', [
            'tags' => \App\Tag::all()->pluck(['name']),
        ]);
    }
    /**
     * Creates A Post In The Database & Redirects To Posts Index
     *
     * Give a request containing post information (title, description, content) the
     * currently authenticated user is retrieved and used to create a new Post Model.
     * The tags relationship is also created by calling createTagsRelationship on the
     * newly created blog model and passing in the topics recieved as part of the request.
     *
     * @param Request $request
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        (Post::create([
            'title' => $request['blog-title'],
            'description' => $request['blog-description'],
            'content' => $request['blog-content'],
            'user_id' => auth()->id(),
        ]))
            ->createTagsRelationship($request['blog-topic']);
        return redirect('/posts');
    }

    public function edit(Post $post): \Illuminate\View\View
    {
        return view('pages.edit-post', [
            'post' => $post,
            'tags' => \App\Tag::all()->pluck(['name']),
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
