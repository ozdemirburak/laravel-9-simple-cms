<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Http\Controllers\Admin\DataTables\ProductDataTable;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends AdminController
{
    /**
     * @var array
     */
    protected $validation = ['title' => 'required|string|max:200', 'description' => 'required|string|max:160'];

    /**
     * @param \App\Http\Controllers\Admin\DataTables\ProductDataTable $dataTable
     *
     * @return mixed
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.table', ['link' => route('admin.product.create')]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function create()
    {
        return view('admin.forms.product', $this->formVariables('product', null));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        return $this->createFlashRedirect(Product::class, $request);
    }

    /**
     * @param \App\Models\Product $product
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function show(Product $product)
    {
        return view('admin.show', ['object' => $product]);
    }

    /**
     * @param \App\Models\Product $product
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function edit(Product $product)
    {
        return view('admin.forms.product', $this->formVariables('product', $product));
    }

    /**
     * @param \App\Models\Product $product
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(Product $product, Request $request)
    {
        return $this->saveFlashRedirect($product, $request);
    }

    /**
     * @param \App\Models\Product $product
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        return $this->destroyFlashRedirect($product);
    }
}
