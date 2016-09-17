<?php

namespace App\Forms\Admin;

use App\Base\Forms\AdminForm;

class ArticlesForm extends AdminForm
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
            ]);
        $this->addButtons();
    }
}
