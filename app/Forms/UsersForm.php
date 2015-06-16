<?php

namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class UsersForm extends Form
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