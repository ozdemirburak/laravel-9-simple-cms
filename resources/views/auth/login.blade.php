@extends('layouts.auth')

@section('title')
    {{ trans('auth.login.title') }} | {{ trans('admin.title') }}
@stop

@section('content')

    <div class="login-box" id="login-box">

        <div class="header">
            <i class="fa fa-sign-in"></i> {{ trans('auth.login.title') }}
        </div>

        {!! Form::open(['method' => 'POST', 'route' => 'auth.login']) !!}

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
            {!! Form::submit(trans('auth.login.submit'), ['class' => 'btn bg-auth btn-block btn-flat']) !!}
            <hr/>
            <div class="row">
                <div class="col-xs-6">
                    <a class="btn btn-link" href="{{ route('password.email') }}"> <i class="fa fa-lock"></i> {{ trans('auth.login.forgot') }}</a>
                </div>
            </div>
        </div>

        {!!  Form::close() !!}
    </div>

@endsection
