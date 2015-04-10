@extends('layouts.admin')

@section('content')
    <img class="img-responsive" alt="" src="{!! $language->flag  !!}" />
    <h1> {{ $language->title  }} ({{ $language->code  }})</h1>
    <h2> {{ trans('admin.fields.language.site_title') . ': ' . $language->site_title  }}</h2>
    <h3> {{ trans('admin.fields.language.site_description') . ': ' . $language->site_description  }}</h3>
@endsection