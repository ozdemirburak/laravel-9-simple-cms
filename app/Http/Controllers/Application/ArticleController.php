<?php

namespace App\Http\Controllers\Application;

use Event;
use App\Events\ArticleWasViewed;
use App\Http\Controllers\Controller;
use App\Article;

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
