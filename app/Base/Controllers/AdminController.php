<?php

namespace App\Base\Controllers;

use App\Language;
use App\Http\Controllers\Controller;
use FormBuilder;
use Laracasts\Flash\Flash;

abstract class AdminController extends Controller
{
    /**
     * Model name
     *
     * @var string
     */
    protected $model = "";

    /**
     * Form class path
     *
     * @var string
     */
    protected $formPath = "";

    /**
     * Upload path
     *
     * @var string
     */
    protected $uploadPath = "uploads";

    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->model = $this->getModel();
        $this->formPath = $this->getFormPath();
    }

    /**
     * Show the form for creating a new category.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return $this->getForm();
    }

    /**
     * Get form
     *
     * @param null $object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getForm($object = null)
    {
        if ($object) {
            $url =  $this->urlRoutePath("update", $object);
            $method = 'PATCH';
            $path = $this->viewPath("edit");
        } else {
            $url =  $this->urlRoutePath("store", $object);
            $method = 'POST';
            $path = $this->viewPath("create");
        }
        $form = $this->createForm($url, $method, $object);
        return view($path, compact('form', 'object'));
    }

    /**
     * Create, flash success or error then redirect
     *
     * @param $class
     * @param $request
     * @param bool|false $imageColumn
     * @param string $path
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function createFlashRedirect($class, $request, $imageColumn = false, $path = "index")
    {
        $model = $class::create($this->getData($request, $imageColumn));
        $model->id ? Flash::success(trans('admin.create.success')) : Flash::error(trans('admin.create.fail'));
        return $this->redirectRoutePath($path);
    }

    /**
     * Save, flash success or error then redirect
     *
     * @param $model
     * @param $request
     * @param bool|false $imageColumn
     * @param string $path
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveFlashRedirect($model, $request, $imageColumn = false, $path = "index")
    {
        $model->fill($this->getData($request, $imageColumn));
        $model->save() ? Flash::success(trans('admin.update.success')) : Flash::error(trans('admin.update.fail'));
        return $this->redirectRoutePath($path);
    }

    /**
     * Delete and flash success or fail then redirect to path
     *
     * @param $model
     * @param string $path
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyFlashRedirect($model, $path = "index")
    {
        $model->delete() ?
            Flash::success(trans('admin.delete.success')) :
            Flash::error(trans('admin.delete.fail'));
        return $this->redirectRoutePath($path);
    }

    /**
     * Returns redirect url path, if error is passed, show it
     *
     * @param string $path
     * @param null $error
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectRoutePath($path = "index", $error = null)
    {
        if ($error) {
            Flash::error(trans($error));
        }
        return redirect($this->urlRoutePath($path));
    }

    /**
     * Returns route path as string
     *
     * @param string $path
     * @return string
     */
    public function routePath($path = "index")
    {
        return 'admin.' . snake_case($this->model) . '.' . $path;
    }

    /**
     * Returns view path for the admin
     *
     * @param string $path
     * @param bool|false $object
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function viewPath($path = "index", $object = false)
    {
        $path = 'admin.' . str_plural(snake_case($this->model))  . '.' . $path;
        if ($object !== false) {
            return view($path, compact('object'));
        } else {
            return $path;
        }
    }

    /**
     * Create form
     *
     * @param $url
     * @param $method
     * @param $model
     * @return \Kris\LaravelFormBuilder\Form
     */
    protected function createForm($url, $method, $model)
    {
        return FormBuilder::create($this->formPath, [
            'method' => $method,
            'url' => $url,
            'model' => $model
        ], $this->getSelectList());
    }

    /**
     * Get data, if image column is passed, upload it
     *
     * @param $request
     * @param $imageColumn
     * @return mixed
     */
    protected function getData($request, $imageColumn)
    {
        return $imageColumn === false ? $request->all() : $this->uploadImage($request, $imageColumn);
    }

    /**
     * Upload the image and return the data
     *
     * @param $request
     * @param string $field
     * @return mixed
     */
    protected function uploadImage($request, $field)
    {
        $data = $request->except($field);
        if ($file = $request->file($field)) {
            $fileName = rename_file($file->getClientOriginalName(), $file->getClientOriginalExtension());
            $path = $this->getUploadPath($field);
            $file->move(public_path($path), $fileName);
            $data[$field] = $path . $fileName;
        }
        return $data;
    }

    /**
     * Return upload path
     *
     * @param $field
     *
     * @return string
     */
    protected function getUploadPath($field)
    {
        return $this->uploadPath . "/" . str_plural($field);
    }

    /**
     * Returns full url
     *
     * @param string $path
     * @param bool|false $model
     * @return string
     */
    protected function urlRoutePath($path = "index", $model = false)
    {
        if ($model) {
            return route($this->routePath($path), ['id' => $model->id]);
        } else {
            return route($this->routePath($path));
        }
    }

    /**
     * Get select list for languages
     *
     * @return mixed
     */
    protected function getSelectList()
    {
        return Language::pluck('title', 'id')->all();
    }

    /**
     * Get model name, if isset the model parameter, then get it, if not then get the class name, strip "Controller" out
     *
     * @return string
     */
    protected function getModel()
    {
        return empty($this->model) ?
            explode('Controller', substr(strrchr(get_class($this), '\\'), 1))[0]  :
            $this->model;
    }

    /**
     * Returns fully class name for form
     *
     * @return string
     */
    protected function getFormPath()
    {
        $model =  title_case(str_plural($this->model));
        return 'App\Forms\Admin\\' . $model . 'Form';
    }
}
