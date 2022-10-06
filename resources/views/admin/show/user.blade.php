@extends('layouts.admin')

@section('content')
    @include('partials.admin.show.init')
    @foreach (['email' => 'email'] as $attribute => $type)
        @include('partials.admin.show.text',['is_show'=>1])
    @endforeach
@endsection
