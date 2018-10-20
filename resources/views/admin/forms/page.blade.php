@extends('layouts.admin')

@section('content')
    @include('partials.admin.form.init')
    @include('partials.admin.form.dropdown', ['attribute' => 'parent_id', 'null' => true])
    @foreach (['title', 'description'] as $a)
        @include('partials.admin.form.text', ['attribute' => $a])
    @endforeach
    @include('partials.admin.form.textarea', ['attribute' => 'content'])
    @include('partials.admin.form.submit')
@endsection
