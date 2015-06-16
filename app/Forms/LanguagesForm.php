<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class LanguagesForm extends Form
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