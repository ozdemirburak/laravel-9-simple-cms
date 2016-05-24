<?php

namespace App\Base\Forms;

use Kris\LaravelFormBuilder\Form;

abstract class AdminForm extends Form
{
    public function buildForm()
    {
        $this->addButtons();
    }

    protected function addButtons()
    {
        $this
            ->add('_save', 'submit', [
                'label' => trans('admin.fields.save'),
                'attr' => ['class' => 'btn btn-primary']
            ])
            ->add('_clear', 'reset', [
                'label' => trans('admin.fields.reset'),
                'attr' => ['class' => 'btn btn-warning']
            ]);
    }
}
