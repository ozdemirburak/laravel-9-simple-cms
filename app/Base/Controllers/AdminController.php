<?php

namespace App\Base\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use App\Language;
use FormBuilder;
use Illuminate\Http\UploadedFile;
use Storage;

abstract class AdminController extends Controller
{
    /**
     * Subdirectory
     *
     * @var string
     */
    protected $subdirectory = '';

    /**
     * Model name
     *
     * @var string
     */
    protected $model = '';

    /**
     * Form class path
     *
     * @var string
     */
    protected $formPath = '';

    /**
     * Upload path
     *
     * @var string
     */
    protected $uploadPath = 'uploads';

    /**
     * @var bool
     */
    protected $withSubdirectory = false;

    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->subdirectory = $this->getSubdirectory();
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
            $url =  $this->urlRoutePath('update', $object);
            $method = 'PATCH';
            $path = $this->viewPath('edit');
        } else {
            $url =  $this->urlRoutePath('store', $object);
            $method = 'POST';
            $path = $this->viewPath('create');
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
    public function createFlashRedirect($class, $request, $imageColumn = false, $path = 'index')
    {
        $model = $class::create($this->getData($request, $imageColumn));
        $model->id ? flash(trans('admin.create.success'), 'success') : flash(trans('admin.create.fail'), 'error');
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
    public function saveFlashRedirect($model, $request, $imageColumn = false, $path = 'index')
    {
        $model->fill($this->getData($request, $imageColumn));
        $model->save() ? flash(trans('admin.update.success'), 'success') : flash(trans('admin.update.fail'), 'error');
        return $this->redirectRoutePath($path);
    }

    /**
     * Delete and flash success or fail then redirect to path
     *
     * @param $model
     * @param string $path
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroyFlashRedirect($model, $path = 'index')
    {
        $model->delete() ? flash(trans('admin.delete.success'), 'success') : flash(trans('admin.delete.fail'), 'error');
        return $this->redirectRoutePath($path);
    }

    /**
     * Returns redirect url path, if error is passed, show it
     *
     * @param string $path
     * @param null $error
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectRoutePath($path = 'index', $error = null)
    {
        if ($error) {
            flash(trans($error), 'error');
        }
        return redirect($this->urlRoutePath($path));
    }

    /**
     * Returns route path as string
     *
     * @param string $path
     * @return string
     */
    public function routePath($path = 'index')
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
    public function viewPath($path = 'index', $object = false)
    {
        if ($this->withSubdirectory !== false) {
            $path = 'admin.' . $this->subdirectory .  '.' . str_plural(snake_case($this->model))  . '.' . $path;
        } else {
            $path = 'admin.' . str_plural(snake_case($this->model))  . '.' . $path;
        }
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
        ], $this->getSelectList($model));
    }

    /**
     * Get data, if image column is passed, upload it
     *
     * @param  Request $request
     * @param  $imageColumn
     * @return mixed
     */
    protected function getData(Request $request, $imageColumn)
    {
        return $imageColumn === false ? $request->all() : $this->uploadImage($request, $imageColumn);
    }

    /**
     * Upload the image and return the data
     *
     * @param  Request $request
     * @param  string $field
     * @return mixed
     */
    protected function uploadImage(Request $request, $field)
    {
        $data = $request->except($field);
        if ($file = $request->file($field)) {
            $data[$field] = $this->uploadAndGetPath($file);
        }
        return $data;
    }

    /**
     * @param $file
     *
     * @return string
     */
    protected function uploadAndGetPath(UploadedFile $file)
    {
        $subfolder = str_plural(mb_strtolower($this->model));
        $path = Storage::disk('uploads')->putFile($subfolder, $file);
        $fullPath = Storage::disk('uploads')->getAdapter()->applyPathPrefix($path);
        list($host, $uploadPath) = explode('/public/', $fullPath);
        return $uploadPath;
    }

    /**
     * Return upload path
     *
     * @return string
     */
    protected function getUploadPath()
    {
        return implode(DIRECTORY_SEPARATOR, [$this->uploadPath, str_plural(strtolower($this->getModel()))]);
    }

    /**
     * Returns full url
     *
     * @param string $path
     * @param bool|false $model
     * @return string
     */
    protected function urlRoutePath($path = 'index', $model = false)
    {
        if ($model) {
            return route($this->routePath($path), ['id' => $model->id]);
        } else {
            return route($this->routePath($path));
        }
    }

    /**
     * Returns fully class name for form
     *
     * @return string
     */
    protected function getFormPath()
    {
        $subdirectory = title_case($this->subdirectory);
        $model =  title_case($this->model);
        if ($this->withSubdirectory !== false) {
            return 'App\Forms\Admin\\' . $subdirectory . '\\' . $model . 'Form';
        } else {
            return 'App\Forms\Admin\\' . $model . 'Form';
        }
    }

    /**
     * Get select list
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
     * Get models subdirectory name, for instance: Single or Admin
     *
     * @return string
     */
    protected function getSubdirectory()
    {
        return empty($this->subdirectory) ?
            strtolower(array_reverse(explode('\\', get_class($this)))[1])  :
            $this->subdirectory;
    }
}
