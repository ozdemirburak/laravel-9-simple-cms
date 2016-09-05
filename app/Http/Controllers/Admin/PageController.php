<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Http\Requests\Admin\PageRequest;
use App\Page;
use Illuminate\Http\Request;

class PageController extends AdminController
{
    /**
     * Display a listing of the pages.
     *
     * @return Response
     */
    public function index()
    {
        $pages = Page::whereLanguageId(session('current_lang')->id);
        $pages = $pages->count() > 1 ? session('current_lang')->pages->toHierarchy() : $pages->get();
        return $this->viewPath("index", $pages);
    }

    /**
     * Store a newly created page in storage
     *
     * @param PageRequest $request
     * @return Response
     */
    public function store(PageRequest $request)
    {
        return $this->createFlashRedirect(Page::class, $request);
    }

    /**
     * Display the specified page.
     *
     * @param Page $page
     * @return Response
     */
    public function show(Page $page)
    {
        return $this->viewPath("show", $page);
    }

    /**
     * Show the form for editing the specified language.
     *
     * @param Page $page
     * @return Response
     */
    public function edit(Page $page)
    {
        return $this->getForm($page);
    }

    /**
     * Update the specified language in storage.
     *
     * @param Page $page
     * @param PageRequest $request
     * @return Response
     */
    public function update(Page $page, PageRequest $request)
    {
        return $this->saveFlashRedirect($page, $request);
    }

    /**
     * Remove the specified language from storage.
     *
     * @param  Page  $page
     * @return Response
     */
    public function destroy(Page $page)
    {
        return $this->destroyFlashRedirect($page);
    }

    /**
     * Save the page ordering
     *
     * @param Request $request
     */
    public function postOrder(Request $request)
    {
        if ($request->ajax()) {
            $pages = json_decode($request->getContent());
            foreach ($pages as $p) {
                $page = Page::findOrFail($p->id);
                $page->lft = $p->lft;
                $page->rgt = $p->rgt;
                $page->parent_id = $p->parent_id != "" ? $p->parent_id : null;
                $page->depth = $p->depth;
                $page->save();
            }
        }
    }
}
