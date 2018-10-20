<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Http\Controllers\Admin\DataTables\ArticleDataTable;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends AdminController
{
    /**
     * @var array
     */
    protected $validation = [
        'content'      => 'required|string',
        'category_id'  => 'required|integer',
        'description'  => 'required|string|max:200',
        'published_at' => 'required|string',
        'title'        => 'required|string|max:200'
    ];

    /**
     * @param \App\Http\Controllers\Admin\DataTables\ArticleDataTable $dataTable
     *
     * @return mixed
     */
    public function index(ArticleDataTable $dataTable)
    {
        return $dataTable->render('admin.table', ['link' => route('admin.article.create')]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function create()
    {
        return view('admin.forms.article', $this->formVariables('article', null, $this->options()));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        return $this->createFlashRedirect(Article::class, $request);
    }

    /**
     * @param \App\Models\Article $article
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function show(Article $article)
    {
        return view('admin.show', ['object' => $article]);
    }

    /**
     * @param \App\Models\Article $article
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function edit(Article $article)
    {
        return view('admin.forms.article', $this->formVariables('article', $article, $this->options()));
    }

    /**
     * @param \App\Models\Article $article
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(Article $article, Request $request)
    {
        return $this->saveFlashRedirect($article, $request);
    }

    /**
     * @param \App\Models\Article $article
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Article $article)
    {
        return $this->destroyFlashRedirect($article);
    }

    /**
     * @return array
     */
    protected function options()
    {
        return ['options' => Category::pluck('title', 'id')];
    }
}
