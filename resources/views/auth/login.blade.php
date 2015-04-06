@extends('layouts.auth')

@section('title')
    {{ trans('auth.login.title') }}
@stop

@section('content')

    <div class="login-box" id="login-box">

        <div class="header">
            {{ trans('admin.title') }}
        </div>

        {!! Form::open(['method' => 'POST', 'url' => '/auth/login']) !!}

        <div class="body bg-gray-50">

            @include('errors.validation')

            <div class="form-group has-feedback">
                {!! Form::label('email', trans('auth.login.email')) !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                <i class="fa fa-envelope form-control-feedback"></i>
            </div>

            <div class="form-group has-feedback">
                {!! Form::label('password', trans('auth.login.password')) !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
                <i class="fa fa-lock form-control-feedback"></i>
            </div>

            <div class="form-group">
                {!! Form::checkbox('remember', '1', true) !!} {{ trans('auth.login.remember') }}
            </div>

        </div>

        <div class="footer">
            {!! Form::submit(trans('auth.login.submit'), ['class' => 'btn bg-olive btn-block btn-flat']) !!}
            <a class="btn btn-link" href="{{ url('/password/email') }}">{{ trans('auth.login.forgot') }}</a>
        </div>

        {!!  Form::close() !!}
    </div>

@endsection