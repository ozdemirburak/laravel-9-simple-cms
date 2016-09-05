<?php

namespace App\Base\Forms;

use Kris\LaravelFormBuilder\Form;

abstract class AdminForm extends Form
{
    /**
     * @param bool $reset
     * @param bool $submit
     */
    protected function addButtons($reset = true, $submit = true)
    {
        if ($submit === true) {
            $this->add('_save', 'submit', [
                'label' => trans('admin.fields.save'),
                'attr' => ['class' => 'btn btn-primary']
            ]);
        }
        if ($reset === true) {
            $this->add('_reset', 'reset', [
                'label' => trans('admin.fields.reset'),
                'attr' => ['class' => 'btn btn-warning']
            ]);
        }
    }
}
