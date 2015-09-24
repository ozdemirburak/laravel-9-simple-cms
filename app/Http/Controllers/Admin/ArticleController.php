<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ArticleRequest;
use Datatable;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class ArticleController extends Controller
{
    /**
     * Display a listing of the articles.
     *
     * @return Response
     */
    public function index()
    {
        $table = $this->setDatatable();
        return view('admin.articles.index', compact('table'));
    }

    /**
     * Show the form for creating a new article.
     *
     * @param FormBuilder $formBuilder
     * @return Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\ArticlesForm', [
            'method' => 'POST',
            'url' => route('admin.article.store')
        ], $this->getSelectList());
        return view('admin.articles.create', compact('form'));
    }

    /**
     * Store a newly created article in storage
     *
     * @param ArticleRequest $request
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        $article = Article::create($request->all());
        $article->id ? Flash::success(trans('admin.create.success')) : Flash::error(trans('admin.create.fail'));
        return redirect(route('admin.article.index'));
    }

    /**
     * Display the specified article.
     *
     * @param Article $article
     * @return Response
     */
    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified article.
     *
     * @param Article $article
     * @param FormBuilder $formBuilder
     * @return Response
     */
    public function edit(Article $article, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\ArticlesForm', [
            'method' => 'PATCH',
            'url' => route('admin.article.update', ['id' => $article->id]),
            'model' => $article
        ], $this->getSelectList());
        return view('admin.articles.edit', compact('form', 'article'));
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
        $article->fill($request->all());
        $article->save() ? Flash::success(trans('admin.update.success')) : Flash::error(trans('admin.update.fail'));
        return redirect(route('admin.article.index'));
    }

    /**
     * Remove the specified article from storage.
     *
     * @param  Article  $article
     * @return Response
     */
    public function destroy(Article $article)
    {
        $article->delete() ? Flash::success(trans('admin.delete.success')) : Flash::error(trans('admin.delete.fail'));
        return redirect(route('admin.article.index'));
    }

    /**
     * Create DataTable HTML
     *
     * @return mixed
     * @throws \Exception
     */
    private function setDatatable()
    {
        return Datatable::table()
            ->addColumn(trans('admin.fields.article.title'), trans('admin.fields.read'), trans('admin.fields.article.category_id'), trans('admin.fields.published_at'),trans('admin.fields.updated_at'))
            ->addColumn(trans('admin.ops.name'))
            ->setUrl(route('api.table.article'))
            ->setOptions(['sPaginationType' => 'bs_normal', 'oLanguage' => trans('admin.datatables')])
            ->render();
    }

    /**
     * Get select list for categories
     *
     * @return mixed
     */
    protected function getSelectList()
    {
        return $this->language->categories->lists('title', 'id')->all();
    }

}