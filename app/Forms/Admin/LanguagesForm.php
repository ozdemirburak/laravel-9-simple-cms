<?php

namespace App\Forms\Admin;

use App\Base\Forms\AdminForm;

class LanguagesForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('title', 'text', [
                'label' => trans('admin.fields.language.title')
            ])
            ->add('code', 'text', [
                'label' => trans('admin.fields.language.code')
            ])
            ->add('site_title', 'text', [
                'label' => trans('admin.fields.language.site_title')
            ])
            ->add('site_description', 'text', [
                'label' => trans('admin.fields.language.site_description')
            ])
            ->add('flag', 'file', [
                'label' => trans('admin.fields.language.flag'),
                'attr' => ['class' => '']
            ]);
        $this->addButtons();
    }
}
