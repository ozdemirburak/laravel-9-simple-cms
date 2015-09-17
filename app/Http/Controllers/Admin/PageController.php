<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageRequest;
use App\Page;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class PageController extends Controller
{
    /**
     * Display a listing of the pages.
     *
     * @return Response
     */
    public function index()
    {
        $pages = Page::whereLanguageId($this->language->id);
        $pages = $pages->count() > 1 ? $this->language->pages->toHierarchy() : $pages->get();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new page.
     *
     * @param FormBuilder $formBuilder
     * @return Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\PagesForm', [
            'method' => 'POST',
            'url' => route('admin.page.store')
        ], $this->getSelectList());
        return view('admin.pages.create', compact('form'));
    }

    /**
     * Store a newly created page in storage
     *
     * @param PageRequest $request
     * @return Response
     */
    public function store(PageRequest $request)
    {
        $page = Page::create($request->all());
        $page->id ? Flash::success(trans('admin.create.success')) : Flash::error(trans('admin.create.fail'));
        return redirect(route('admin.page.index'));
    }

    /**
     * Display the specified page.
     *
     * @param Page $page
     * @return Response
     */
    public function show(Page $page)
    {
        return view('admin.pages.show', compact('page'));
    }

    /**
     * Show the form for editing the specified page.
     *
     * @param Page $page
     * @param FormBuilder $formBuilder
     * @return Response
     */
    public function edit(Page $page, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\PagesForm', [
            'method' => 'PATCH',
            'url' => route('admin.page.update', ['id' => $page->id]),
            'model' => $page
        ], $this->getSelectList());
        return view('admin.pages.edit', compact('form', 'page'));
    }

    /**
     * Update the specified page in storage.
     *
     * @param Page $page
     * @param PageRequest $request
     * @return Response
     */
    public function update(Page $page, PageRequest $request)
    {
        $page->fill($request->all());
        $page->save() ? Flash::success(trans('admin.update.success')) : Flash::error(trans('admin.update.fail'));
        return redirect(route('admin.page.index'));
    }

    /**
     * Remove the specified page from storage.
     *
     * @param  Page  $page
     * @return Response
     */
    public function destroy(Page $page)
    {
        $page->delete() ? Flash::success(trans('admin.delete.success')) : Flash::error(trans('admin.delete.fail'));
        return redirect(route('admin.page.index'));
    }

    /**
     * Save the page ordering
     *
     * @param Request $request
     */
    public function postOrder(Request $request)
    {
        if($request->ajax())
        {
            $pages = json_decode($request->getContent());
            foreach($pages as $p)
            {
                $page = Page::findOrFail($p->id);
                $page->lft = $p->lft;
                $page->rgt = $p->rgt;
                $page->parent_id = $p->parent_id != "" ? $p->parent_id : NULL;
                $page->depth = $p->depth;
                $page->save();
            }
        }
    }

}