<?php

namespace App\Forms\Admin;

use App\Base\Forms\AdminForm;

class PagesForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('language_id', 'choice', [
                'choices' => $this->data,
                'label' => trans('admin.fields.page.language_id')
            ])
            ->add('title', 'text', [
                'label' => trans('admin.fields.page.title')
            ])
            ->add('content', 'textarea', [
                'label' => trans('admin.fields.page.content')
            ])
            ->add('description', 'text', [
                'label' => trans('admin.fields.page.description')
            ]);
        $this->addButtons();
    }
}
