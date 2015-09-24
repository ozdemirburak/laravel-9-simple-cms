<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use Datatable;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return Response
     */
    public function index()
    {
        $table = $this->setDatatable();
        return view('admin.categories.index', compact('table'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @param FormBuilder $formBuilder
     * @return Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\CategoriesForm', [
            'method' => 'POST',
            'url' => route('admin.category.store')
        ], $this->getSelectList());
        return view('admin.categories.create', compact('form'));
    }

    /**
     * Store a newly created category in storage
     *
     * @param CategoryRequest $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->all());
        $category->id ? Flash::success(trans('admin.create.success')) : Flash::error(trans('admin.create.fail'));
        return redirect(route('admin.category.index'));
    }

    /**
     * Display the specified category.
     *
     * @param Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param Category $category
     * @param FormBuilder $formBuilder
     * @return Response
     */
    public function edit(Category $category, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\CategoriesForm', [
            'method' => 'PATCH',
            'url' => route('admin.category.update', ['id' => $category->id]),
            'model' => $category
        ], $this->getSelectList());
        return view('admin.categories.edit', compact('form', 'category'));
    }

    /**
     * Update the specified category in storage.
     *
     * @param Category $category
     * @param CategoryRequest $request
     * @return Response
     */
    public function update(Category $category, CategoryRequest $request)
    {
        $category->fill($request->all());
        $category->save() ? Flash::success(trans('admin.update.success')) : Flash::error(trans('admin.update.fail'));
        return redirect(route('admin.category.index'));
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  Category  $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        $category->delete() ? Flash::success(trans('admin.delete.success')) : Flash::error(trans('admin.delete.fail'));
        return redirect(route('admin.category.index'));
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
            ->addColumn(trans('admin.fields.category.title'), trans('admin.fields.updated_at'))
            ->addColumn(trans('admin.ops.name'))
            ->setUrl(route('api.table.category'))
            ->setOptions(['sPaginationType' => 'bs_normal', 'oLanguage' => trans('admin.datatables')])
            ->render();
    }

}