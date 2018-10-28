<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

/**
 * HomeController class Used To Serve Home View
 * 
 * HomeController class is a very simple class with the single 
 * responsibility of serving the home view required.
 */
class HomeController extends Controller
{
    /**
     * Return home view.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        return view('pages.home', [
            'posts' => Post::getLatestPosts(2)
        ]);
    }
}
