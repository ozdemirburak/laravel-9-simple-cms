<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class ArticlesForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('published_at', 'date', [
                'label' => trans('admin.fields.published_at')
            ])
            ->add('title', 'text', [
                'label' => trans('admin.fields.article.title')
            ])
            ->add('category_id', 'choice', [
                'choices' => $this->data,
                'label' => trans('admin.fields.article.category_id')
            ])
            ->add('content', 'textarea', [
                'label' => trans('admin.fields.article.content')
            ])
            ->add('description', 'text', [
                'label' => trans('admin.fields.article.description')
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