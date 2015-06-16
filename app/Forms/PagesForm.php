<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class PagesForm extends Form
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