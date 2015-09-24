<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LanguageRequest;
use App\Language;
use App\Services\ImageService;
use Datatable;
use Input;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;
use Redirect;

class LanguageController extends Controller
{
    /**
     * Display a listing of the languages.
     *
     * @return Response
     */
    public function index()
    {
        $table = $this->setDatatable();
        return view('admin.languages.index', compact('table'));
    }

    /**
     * Show the form for creating a new language.
     *
     * @param FormBuilder $formBuilder
     * @return Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\LanguagesForm', [
            'method' => 'POST',
            'url' => route('admin.language.store')
        ]);
        return view('admin.languages.create', compact('form'));
    }

    /**
     * Store a newly created language in storage
     *
     * @param LanguageRequest $request
     * @return Response
     */
    public function store(LanguageRequest $request)
    {
        $language = Language::create(ImageService::uploadImage($request, 'flag'));
        $language->id ? Flash::success(trans('admin.create.success')) : Flash::error(trans('admin.create.fail'));
        return redirect(route('admin.language.index'));
    }

    /**
     * Display the specified language.
     *
     * @param Language $language
     * @return Response
     */
    public function show(Language $language)
    {
        return view('admin.languages.show', compact('language'));
    }

    /**
     * Show the form for editing the specified language.
     *
     * @param Language $language
     * @param FormBuilder $formBuilder
     * @return Response
     */
    public function edit(Language $language, FormBuilder $formBuilder)
    {
        $form = $formBuilder->create('App\Forms\LanguagesForm', [
            'method' => 'PATCH',
            'url' => route('admin.language.update', ['id' => $language->id]),
            'model' => $language
        ]);
        return view('admin.languages.edit', compact('form', 'language'));
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
        $language->fill(ImageService::uploadImage($request, 'flag'));
        $language->save() ? Flash::success(trans('admin.update.success')) : Flash::error(trans('admin.update.fail'));
        return redirect(route('admin.language.index'));
    }

    /**
     * Remove the specified language from storage.
     *
     * @param  Language  $language
     * @return Response
     */
    public function destroy(Language $language)
    {
        $language->delete() ? Flash::success(trans('admin.delete.success')) : Flash::error(trans('admin.delete.fail'));
        return redirect(route('admin.language.index'));
    }

    /**
     * Change language
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postChange()
    {
        session(['language' => Input::get('language')]);
        return Redirect::back();
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
            ->addColumn(trans('admin.fields.language.title'), trans('admin.fields.language.code'), trans('admin.fields.updated_at'))
            ->addColumn(trans('admin.ops.name'))
            ->setUrl(route('api.table.language'))
            ->setOptions(['sPaginationType' => 'bs_normal', 'oLanguage' => trans('admin.datatables')])
            ->render();
    }

}