<?php

namespace App\Base\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;
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
     * Upload path
     *
     * @var string
     */
    protected $uploadPath = 'i/uploads';

    /**
     * @var bool
     */
    protected $withSubdirectory = false;

    /**
     * @var string
     */
    protected $flashKey = 'message';

    /**
     * @var array
     */
    protected $validation = [];

    /**
     * AdminController constructor.
     */
    public function __construct()
    {
        $this->subdirectory = $this->getSubdirectory();
        $this->model = $this->getModel();
    }

    /**
     * Create, flash success or error then redirect
     *
     * @param            $class
     * @param            $request
     * @param bool|false $imageColumn
     * @param string     $path
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function createFlashRedirect($class, Request $request, $imageColumn = false, $path = 'index')
    {
        $this->validate($request, $this->validation);
        $model = $class::create($this->getData($request, $imageColumn));
        return $this->flashRedirect('create', $model->id, $path);
    }

    /**
     * Save, flash success or error then redirect
     *
     * @param            $model
     * @param            $request
     * @param bool|false $imageColumn
     * @param string     $path
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function saveFlashRedirect($model, $request, $imageColumn = false, $path = 'index')
    {
        $this->validate($request, $this->validation);
        $model->fill($this->getData($request, $imageColumn));
        return $this->flashRedirect('update', $model->save(), $path);
    }

    /**
     * Delete and flash success or fail then redirect to path
     *
     * @param        $model
     * @param string $path
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroyFlashRedirect($model, $path = 'index')
    {
        return $this->flashRedirect('delete', $model->delete(), $path);
    }

    /**
     * Flash operation and then redirect to path
     *
     * @param        $isSuccess
     * @param        $operation
     * @param string $path
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function flashRedirect($operation, $isSuccess, $path = 'index')
    {
        $this->flash($operation, $isSuccess ? 'success' : 'fail');
        $this->resetCache();
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
            session()->flash($this->flashKey, __($error));
        }
        return redirect($this->urlRoutePath($path));
    }

    /**
     * Returns route path as string
     *
     * @param string $path
     * @return string
     */
    public function routePath($path = 'index'): string
    {
        return 'admin.' . Str::snake($this->model) . '.' . $path;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $imageColumn
     *
     * @return array|mixed
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
    protected function uploadAndGetPath(UploadedFile $file): string
    {
        $subfolder = Str::plural(mb_strtolower($this->model));
        $path = Storage::disk('uploads')->putFile($subfolder, $file);
        $fullPath = Storage::disk('uploads')->getAdapter()->applyPathPrefix($path);
        [$host, $uploadPath] = explode('/public/', $fullPath);
        return $uploadPath;
    }

    /**
     * Return upload path
     *
     * @return string
     */
    protected function getUploadPath(): string
    {
        return implode(DIRECTORY_SEPARATOR, [$this->uploadPath, Str::plural(strtolower($this->getModel()))]);
    }

    /**
     * Returns full url
     *
     * @param string $path
     * @param bool|false $model
     * @return string
     */
    protected function urlRoutePath($path = 'index', $model = false): string
    {
        if ($model) {
            return route($this->routePath($path), ['id' => $model->id]);
        }
        return route($this->routePath($path));
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
    protected function getSubdirectory(): string
    {
        return empty($this->subdirectory) ?
            strtolower(array_reverse(explode('\\', \get_class($this)))[1])  :
            $this->subdirectory;
    }

    /**
     * @param $operation
     * @param $result
     */
    protected function flash($operation, $result): void
    {
        $this->flashRaw(__(implode('.', ['admin', $operation, $result])));
    }

    /**
     * @param $message
     */
    protected function flashRaw($message): void
    {
        session()->flash($this->flashKey, $message);
    }

    /**
     * @param       $resource
     *
     * @param null  $data
     * @param array $merge
     *
     * @return array
     */
    protected function formVariables($resource, $data = null, array $merge = []): array
    {
        return array_merge(['resource' => $resource, $resource => $data], $merge);
    }

    /**
     * @return bool
     * @throws \Exception
     */
    protected function resetCache(): bool
    {
        return Artisan::call('cache:clear');
    }
}
