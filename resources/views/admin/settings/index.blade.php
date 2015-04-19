@extends('layouts.admin')

@section('content')
    {!! form($form) !!}
    @unless ($setting->logo == "")
        <div class="uploaded-file">
            <strong>{{ trans('admin.fields.uploaded')  }}</strong>
            <img class="img-responsive" alt="" src="{!! $setting->logo  !!}" />
        </div>
    @endunless
@endsection