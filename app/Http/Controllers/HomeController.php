<?php

namespace App\Http\Controllers;

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
     * @return Illuminate\View\View
     */
    public function index()
    {
        return view('pages.home');
    }
}
