<?php

namespace App\Forms\Admin;

use App\Base\Forms\AdminForm;

class CategoriesForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('language_id', 'choice', [
                'choices' => $this->data,
                'label' => trans('admin.fields.category.language_id')
            ])
            ->add('title', 'text', [
                'label' => trans('admin.fields.category.title')
            ])
            ->add('color', 'text', [
                'label' => trans('admin.fields.category.color')
            ])
            ->add('description', 'text', [
                'label' => trans('admin.fields.category.description')
            ]);
        $this->addButtons();
    }
}
