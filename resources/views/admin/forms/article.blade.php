@extends('layouts.admin')

@section('content')
    @include('partials.admin.form.init')
    @include('partials.admin.form.dropdown', ['attribute' => 'category_id'])
    @include('partials.admin.form.text', ['attribute' => 'published_at', 'class' => 'datepicker', 'default' => now()->format('Y-m-d')])
    @foreach (['title', 'description'] as $a)
        @include('partials.admin.form.text', ['attribute' => $a])
    @endforeach
    @include('partials.admin.form.textarea', ['attribute' => 'content'])
    @include('partials.admin.form.submit')
@endsection
