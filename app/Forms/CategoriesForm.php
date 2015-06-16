<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class CategoriesForm extends Form
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
            ])
            ->add('save', 'submit', [
                'label' => trans('admin.fields.save'),
                'attr' => ['class' => 'btn btn-primary']
            ])
            ->add('clear', 'reset', [
                'label' => trans('admin.fields.reset'),
                'attr' => ['class' => 'btn btn-warning']
            ]);
    }
}