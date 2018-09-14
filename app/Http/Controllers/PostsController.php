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
       $posts = Post::latest()
            ->filters(request(['month', 'year']))
            ->get();
        $posts = array_slice(
            $posts->toArray(),
            $this->getPaginationStart(Paginator::resolveCurrentPage()),
            self::PAGE_LIMIT
        );
        return new Paginator($posts, self::PAGE_LIMIT);
    }

    public function show(Post $post)
    {
        return $post;
    }

    private function getPaginationStart($currentPage)
    {
        return (self::PAGE_LIMIT * $currentPage) - self::PAGE_LIMIT;
    }
}
