<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\LanguageRequest;
use App\Language;
use Laracasts\Flash\Flash;
use Kris\LaravelFormBuilder\FormBuilder;
use Datatable;

class LanguageController extends Controller {

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
        $data = $this->storeImage($request, 'flag');
        Language::create($data) == true ? Flash::success(trans('admin.create.success')) :
            Flash::error(trans('admin.create.fail'));
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
            'method' => 'PUT',
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
        $data = $this->storeImage($request, 'flag');
        $language->fill($data);
        $language->save() == true ? Flash::success(trans('admin.update.success')) :
            Flash::error(trans('admin.update.fail'));
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
        $language->delete() == true ? Flash::success(trans('admin.delete.success')) :
            Flash::error(trans('admin.delete.fail'));
        return redirect(route('admin.language.index'));
    }

    /**
     * Save image to uploads folder and change the name to something unique
     *
     * @param LanguageRequest $request
     * @param $field
     * @return array
     */
    private function storeImage(LanguageRequest $request, $field)
    {
        $data = $request->except([$field]);
        if($request->file($field))
        {
            $file = $request->file($field);
            $request->file($field);
            dd($file->getClientOriginalName());
            $fileName = rename_file($file->getClientOriginalName(), $file->getClientOriginalExtension());
            $path = '/uploads/' . str_plural($field);
            $move_path = public_path() . $path;
            $file->move($move_path, $fileName);
            $data[$field] = $path . $fileName;
        }
        return $data;
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
            ->addColumn(trans('admin.fields.language.title'), trans('admin.fields.language.code'), trans('admin.fields.updated_at'))
            ->addColumn(trans('admin.ops.name'))
            ->setUrl(route('admin.language.table'))
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
        return Datatable::collection(Language::all())
            ->showColumns('title', 'code')
            ->addColumn('updated_at', function($model)
            {
                return $model->updated_at->diffForHumans();
            })
            ->addColumn('',function($model)
            {
                return get_ops('language', $model->id);
            })
            ->searchColumns('title')
            ->orderColumns('title','code')
            ->make();
    }

}