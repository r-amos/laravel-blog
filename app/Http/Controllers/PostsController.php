<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Post;
use App\Tag;
class PostsController extends Controller
{

    const PAGE_LIMIT = 5;

    public function __construct()
    {
        $this->middleware('auth')
            ->only('create', 'store');
    }

    public function index()
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

    public function show(Post $post)
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
    private function getPaginationStart($currentPage)
    {
        return (self::PAGE_LIMIT * $currentPage) - self::PAGE_LIMIT;
    }

}
