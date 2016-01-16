@extends('layouts.admin')

@section('content')
    <img class="img-responsive" alt="" src="{!! $object->flag  !!}" />
    <h1> {{ $object->title  }} ({{ $object->code  }})</h1>
    <h2> {{ trans('admin.fields.language.site_title') . ': ' . $object->site_title  }}</h2>
    <h3> {{ trans('admin.fields.language.site_description') . ': ' . $object->site_description  }}</h3>
@endsection