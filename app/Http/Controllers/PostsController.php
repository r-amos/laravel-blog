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
       $paginationStart = $this->getPaginationStart(Paginator::resolveCurrentPage());
        $allPosts = Post::latest()
            ->filters(request(['month', 'year']))
            ->get()->toArray();
        $posts = array_slice($allPosts,
            $paginationStart,
            self::PAGE_LIMIT
        );
        $paginator = (new Paginator($posts, self::PAGE_LIMIT))
            ->hasMorePagesWhen($paginationStart < count($allPosts) - self::PAGE_LIMIT)
            ->withPath('posts');
        return view(
            'pages.posts',
            ['posts' => $paginator]
        );
    }

    public function show(Post $post)
    {
        return $post;
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
