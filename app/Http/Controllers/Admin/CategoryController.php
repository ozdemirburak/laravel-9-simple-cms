<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Category;
use App\Http\Controllers\Api\DataTables\CategoryDataTable;
use App\Http\Requests\Admin\CategoryRequest;

class CategoryController extends AdminController
{
    /**
     * Display a listing of the categories.
     *
     * @param CategoryDataTable $dataTable
     * @return Response
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render($this->viewPath());
    }

    /**
     * Store a newly created category in storage
     *
     * @param CategoryRequest $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        return $this->createFlashRedirect(Category::class, $request);
    }

    /**
     * Display the specified category.
     *
     * @param Category $category
     * @return Response
     */
    public function show(Category $category)
    {
        return $this->viewPath("show", $category);
    }

    /**
     * Show the form for editing the specified category.
     *
     * @param Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        return $this->getForm($category);
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
        return $this->saveFlashRedirect($category, $request);
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  Category  $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        return $this->destroyFlashRedirect($category);
    }
}
