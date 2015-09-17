<?php

namespace App\Http\Controllers\Application;

use App\Article;
use App\Events\ArticleWasViewed;
use App\Http\Controllers\Controller;
use Event;

class ArticleController extends Controller
{
    /**
     * Show the article.
     *
     * @param Article $article
     * @return Response
     */
    public function index(Article $article)
    {
        Event::fire(new ArticleWasViewed($article));
        return view('application.article.index', compact('article'));
    }

}
