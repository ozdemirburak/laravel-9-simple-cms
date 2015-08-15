@extends('layouts.admin')

@section('content')
    {!! form($form) !!}
    @include('partials.admin.image', ['image'=> $setting->logo])
@endsection
