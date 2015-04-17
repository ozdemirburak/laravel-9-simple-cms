@extends('layouts.admin')

@section('content')
    {!! form($form) !!}
    @unless ($user->picture == "")
        <div class="uploaded-file">
            <strong>{{ trans('admin.fields.uploaded')  }}</strong>
            <img class="img-responsive" alt="" src="{!! $user->picture  !!}" />
        </div>
    @endunless
@endsection