<?php

namespace App\Http\Controllers;

class StaticController extends Controller
{
    /**
     * Shows the about page
     * 
     * @return Response
     */
    public function about() {
        return view('pages.about');
    }
    /**
     * Shows the faq page
     * 
     * @return Response
     */
    public function faq() {
        return view('pages.faq');
    }
}