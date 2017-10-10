<?php

namespace App\Forms\Admin;

use App\Base\Forms\AdminForm;

class SettingForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('email', 'text', [
                'label' => trans('admin.fields.setting.email')
            ])
            ->add('facebook', 'text', [
                'label' => trans('admin.fields.setting.facebook')
            ])
            ->add('twitter', 'text', [
                'label' => trans('admin.fields.setting.twitter')
            ])
            ->add('analytics_id', 'text', [
                'label' => trans('admin.fields.setting.analytics_id')
            ])
            ->add('disqus_shortname', 'text', [
                'label' => trans('admin.fields.setting.disqus_shortname')
            ])
            ->add('logo', 'file', [
                'label' => trans('admin.fields.setting.logo'),
                'attr' => ['class' => '']
            ]);
        $this->addButtons();
    }
}
