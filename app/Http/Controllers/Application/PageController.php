<?php

namespace App\Http\Controllers\Application;

use App\Base\Controllers\ApplicationController;
use App\Page;

class PageController extends ApplicationController
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
