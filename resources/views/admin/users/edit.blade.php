@extends('layouts.admin')

@section('content')
    {!! form($form) !!}
    @include('partials.admin.image', ['image'=> $user->picture])
@endsection
