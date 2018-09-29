<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/**
 * ContactController class Used To Serve Contact View
 * 
 * ContactController class is a very simple class with the single 
 * responsibility of serving the contact view required.
 */
class ContactController extends Controller
{
    /**
     * Return contact view.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        return view('pages.contact');
    }
}
