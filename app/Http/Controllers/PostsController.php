<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Post;

class PostsController extends Controller
{

    const PAGE_LIMIT = 5;

    public function index()
    {                  
        return view(
            'pages.posts',
            [
                'posts' => Post::getPageItems(
                    Post::latest()
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
        return view('pages.create-post');
    }

    public function store(Request $request)
    {
        Post::create([
            'title' => $request['title'],
            'content' => $request['content'],
            'user_id' => 1
        ]);
        return redirect('/posts');
    }

    private function getPaginationStart($currentPage)
    {
        return (self::PAGE_LIMIT * $currentPage) - self::PAGE_LIMIT;
    }

}
