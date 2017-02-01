<?php

namespace App\Http\Controllers\Application;

use App\Article;
use App\Base\Controllers\ApplicationController;

class ArticleController extends ApplicationController
{
    /**
     * Show the article.
     *
     * @param Article $article
     * @return Response
     */
    public function index(Article $article)
    {
        return view('application.article.index', compact('article'));
    }
}
