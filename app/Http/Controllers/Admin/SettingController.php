<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Services\ImageService;
use App\Setting;
use Kris\LaravelFormBuilder\FormBuilder;
use Laracasts\Flash\Flash;

class SettingController extends Controller
{
    /**
     * Show the form for editing the settings.
     *
     * @param FormBuilder $formBuilder
     * @return Response
     */
    public function getSettings(FormBuilder $formBuilder)
    {
        $setting = Setting::firstOrFail();
        $form = $formBuilder->create('App\Forms\SettingsForm', [
            'method' => 'PATCH',
            'url' => route('admin.setting.update', ['id' => $setting->id]),
            'model' => $setting
        ]);
        return view('admin.settings.index', compact('form', 'setting'));
    }

    /**
     * Update the settings in storage.
     *
     * @param Setting $setting
     * @param SettingRequest $request
     * @return Response
     */
    public function patchSettings(Setting $setting, SettingRequest $request)
    {
        $setting->fill(ImageService::uploadImage($request, 'logo'));
        $setting->save() ? Flash::success(trans('admin.update.success')) : Flash::error(trans('admin.update.fail'));
        return redirect(route('admin.setting.index'));
    }

}