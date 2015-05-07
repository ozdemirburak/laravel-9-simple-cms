<?php namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Article;

class ArticleController extends Controller {

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
