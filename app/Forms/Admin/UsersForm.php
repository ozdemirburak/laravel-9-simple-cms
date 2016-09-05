<?php

namespace App\Forms\Admin;

use App\Base\Forms\AdminForm;

class UsersForm extends AdminForm
{
    public function buildForm()
    {
        $this
            ->add('name', 'text', [
                'label' => trans('admin.fields.user.name')
            ])
            ->add('email', 'email', [
                'label' => trans('admin.fields.user.email')
            ])
            ->add('password', 'password', [
                'label' => trans('admin.fields.user.password')
            ])
            ->add('password_confirmation', 'password', [
                'label' => trans('admin.fields.user.password_confirmation')
            ])
            ->add('picture', 'file', [
                'label' => trans('admin.fields.user.picture'),
                'attr' => ['class' => '']
            ]);
        $this->addButtons();
    }
}
