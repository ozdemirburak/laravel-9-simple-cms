<?php

namespace App\Http\Controllers\Admin;

use App\Base\Controllers\AdminController;
use App\Base\Traits\LanguageChangeTrait;
use App\Http\Controllers\Api\DataTables\LanguageDataTable;
use App\Http\Requests\Admin\LanguageRequest;
use App\Language;

class LanguageController extends AdminController
{
    use LanguageChangeTrait;

    /**
     * Image column of the model
     *
     * @var string
     */
    private $imageColumn = "flag";

    /**
     * Display a listing of the languages.
     *
     * @param LanguageDataTable $dataTable
     * @return Response
     */
    public function index(LanguageDataTable $dataTable)
    {
        return $dataTable->render($this->viewPath());
    }

    /**
     * Store a newly created language in storage
     *
     * @param LanguageRequest $request
     * @return Response
     */
    public function store(LanguageRequest $request)
    {
        return $this->createFlashRedirect(Language::class, $request, $this->imageColumn);
    }

    /**
     * Display the specified language.
     *
     * @param Language $language
     * @return Response
     */
    public function show(Language $language)
    {
        return $this->viewPath("show", $language);
    }

    /**
     * Show the form for editing the specified language.
     *
     * @param Language $language
     * @return Response
     */
    public function edit(Language $language)
    {
        return $this->getForm($language);
    }

    /**
     * Update the specified language in storage.
     *
     * @param Language $language
     * @param LanguageRequest $request
     * @return Response
     */
    public function update(Language $language, LanguageRequest $request)
    {
        return $this->saveFlashRedirect($language, $request, $this->imageColumn);
    }

    /**
     * Remove the specified language from storage.
     *
     * @param  Language  $language
     * @return Response
     */
    public function destroy(Language $language)
    {
        return $this->destroyFlashRedirect($language);
    }
}
