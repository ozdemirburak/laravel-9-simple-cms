<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Page;

class PageController extends Controller
{
    /**
     * Show the page
     *
     * @param Page $page
     * @return Response
     */
    public function index(Page $page)
    {
        return view('application.page.index', compact('page'));
    }

}
