<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\ArticleRequest;
use App\Article;
use App\Category;
use Laracasts\Flash\Flash;
use Kris\LaravelFormBuilder\FormBuilder;
use Datatable;

class ArticleController extends Controller {

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
        $categories = Category::lists('title', 'id');
        $form = $formBuilder->create('App\Forms\ArticlesForm', [
            'method' => 'POST',
            'url' => route('admin.article.store')
        ], $categories);
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
        Article::create($request->all()) == true ? Flash::success(trans('admin.create.success')) :
            Flash::error(trans('admin.create.fail'));
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
        $categories = Category::lists('title', 'id');
        $form = $formBuilder->create('App\Forms\ArticlesForm', [
            'method' => 'PUT',
            'url' => route('admin.article.update', ['id' => $article->id]),
            'model' => $article
        ], $categories);
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
        $article->save() == true ? Flash::success(trans('admin.update.success')) :
            Flash::error(trans('admin.update.fail'));
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
        $article->delete() == true ? Flash::success(trans('admin.delete.success')) :
            Flash::error(trans('admin.delete.fail'));
        return redirect(route('admin.article.index'));
    }

    /**
     * Create Datatable HTML
     *
     * @return mixed
     * @throws \Exception
     */
    private function setDatatable()
    {
        return Datatable::table()
            ->addColumn(trans('admin.fields.article.title'), trans('admin.fields.read'), trans('admin.fields.article.category_id'), trans('admin.fields.published_at'),trans('admin.fields.updated_at'))
            ->addColumn(trans('admin.ops.name'))
            ->setUrl(route('admin.article.table'))
            ->setOptions(array('sPaginationType' => 'bs_normal', 'oLanguage' => trans('admin.datatables')))
            ->render();
    }

    /**
     * JSON data for seeding Datatable
     *
     * @return mixed
     */
    public function getDatatable()
    {
        return Datatable::collection(Article::all())
            ->showColumns('title', 'read')
            ->addColumn('category_id', function($model)
            {
                return $model->category->title;
            })
            ->addColumn('published_at', function($model)
            {
                return $model->published_at;
            })
            ->addColumn('updated_at', function($model)
            {
                return $model->updated_at->diffForHumans();
            })
            ->addColumn('',function($model)
            {
                return get_ops('article', $model->id);
            })
            ->searchColumns('title')
            ->orderColumns('title', 'category_id', 'published_at', 'read')
            ->make();
    }

}