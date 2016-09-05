<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Base\Controllers\AdminController;
use App\Http\Controllers\Api\DataTables\ArticleDataTable;
use App\Http\Requests\Admin\ArticleRequest;

class ArticleController extends AdminController
{
    /**
     * Display a listing of the articles.
     *
     * @param ArticleDataTable $dataTable
     * @return Response
     */
    public function index(ArticleDataTable $dataTable)
    {
        return $dataTable->render($this->viewPath());
    }

    /**
     * Store a newly created article in storage
     *
     * @param ArticleRequest $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        return $this->createFlashRedirect(Article::class, $request);
    }

    /**
     * Display the specified article.
     *
     * @param Article $article
     * @return Response
     */
    public function show(Article $article)
    {
        return $this->viewPath("show", $article);
    }

    /**
     * Show the form for editing the specified article.
     *
     * @param Article $article
     * @return Response
     */
    public function edit(Article $article)
    {
        return $this->getForm($article);
    }

    /**
     * Update the specified article in storage.
     *
     * @param Article $article
     * @param ArticleRequest $request
     * @return Response
     */
    public function update(Article $article, ArticleRequest $request)
    {
        return $this->saveFlashRedirect($article, $request);
    }

    /**
     * Remove the specified article from storage.
     *
     * @param  Article  $article
     * @return Response
     */
    public function destroy(Article $article)
    {
        return $this->destroyFlashRedirect($article);
    }

    /**
     * Get select list for categories
     *
     * @return mixed
     */
    protected function getSelectList()
    {
        return session('current_lang')->categories->pluck('title', 'id')->all();
    }
}
