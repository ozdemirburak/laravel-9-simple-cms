<?php namespace App\Forms;

use Kris\LaravelFormBuilder\Form;

class SettingsForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('email', 'text', [
                'label' => trans('admin.fields.setting.email')
            ])
            ->add('facebook', 'text', [
                'label' => trans('admin.fields.setting.facebook')
            ])
            ->add('twitter', 'text', [
                'label' => trans('admin.fields.setting.twitter')
            ])
            ->add('logo', 'file', [
                'label' => trans('admin.fields.setting.logo'),
                'attr' => ['class' => '']
            ])
            ->add('status', 'choice', [
                'label' => trans('admin.fields.setting.status.title'),
                'choices' => ['0' => trans('admin.fields.setting.status.down'), '1' => trans('admin.fields.setting.status.up')]
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