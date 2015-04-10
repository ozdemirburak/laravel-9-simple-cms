@extends('layouts.admin')

@section('content')
    {!! form($form) !!}
    @unless ($language->flag == "")
    <div class="uploaded-file">
        <strong>{{ trans('admin.fields.uploaded')  }}</strong>
        <img class="img-responsive" alt="" src="{!! $language->flag  !!}" />
    </div>
    @endunless
@endsection