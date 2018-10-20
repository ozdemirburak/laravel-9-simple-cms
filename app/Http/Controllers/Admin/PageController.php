<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Http\Controllers\Admin\DataTables\PageDataTable;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends AdminController
{
    /**
     * @var array
     */
    protected $validation = [
        'content'     => 'required|string',
        'parent_id'   => 'nullable|integer',
        'description' => 'required|string|max:200',
        'title'       => 'required|string|max:200'
    ];

    /**
     * @param \App\Http\Controllers\Admin\DataTables\PageDataTable $dataTable
     *
     * @return mixed
     */
    public function index(PageDataTable $dataTable)
    {
        return $dataTable->render('admin.table', ['link' => route('admin.page.create')]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function create()
    {
        return view('admin.forms.page', $this->formVariables('page', null, $this->options()));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function store(Request $request)
    {
        return $this->createFlashRedirect(Page::class, $request);
    }

    /**
     * @param \App\Models\Page $page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function show(Page $page)
    {
        return view('admin.show', ['object' => $page]);
    }

    /**
     * @param \App\Models\Page $page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function edit(Page $page)
    {
        return view('admin.forms.page', $this->formVariables('page', $page, $this->options($page->id)));
    }

    /**
     * @param \App\Models\Page $page
     * @param \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function update(Page $page, Request $request)
    {
        return $this->saveFlashRedirect($page, $request);
    }

    /**
     * @param \App\Models\Page $page
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Page $page)
    {
        return $this->destroyFlashRedirect($page);
    }

    /**
     * @param null $id
     *
     * @return array
     */
    protected function options($id = null): array
    {
        return ['options' => Page::when($id !== null, function ($q) use ($id) {
            return $q->where('id', '!=', $id)->where('parent_id', null);
        })->pluck('title', 'id')];
    }
}
