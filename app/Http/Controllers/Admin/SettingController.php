<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Setting;
use App\Http\Requests\SettingRequest;
use Laracasts\Flash\Flash;
use Kris\LaravelFormBuilder\FormBuilder;

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
        $setting->fill($request->all());
        $setting->save() == true ? Flash::success(trans('admin.update.success')) :
            Flash::error(trans('admin.update.fail'));
        return redirect(route('admin.setting.index'));
    }

}
