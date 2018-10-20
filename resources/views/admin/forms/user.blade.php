@extends('layouts.admin')

@section('content')
    @include('partials.admin.form.init')
    @foreach (['email' => 'email', 'password' => 'password', 'password_confirmation' => 'password'] as $attribute => $type)
        @include('partials.admin.form.text')
    @endforeach
    @include('partials.admin.form.submit')
@endsection
