<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the application homepage to the user.
     *
     * @return Response
     */
    public function index()
    {
        $articles = $this->language->articles()->published()->orderBy('published_at','desc')->paginate(5);
        return view('application.home.index', compact('articles'));
    }
}