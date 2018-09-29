<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
 * AboutController Class Used To Serve The About View
 * 
 * AboutController class is a very simple class with the single 
 * responsibility of returning the about view when required.
 */
class AboutController extends Controller
{
    /**
     * Return about view.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        return view('pages.about');
    }
}
