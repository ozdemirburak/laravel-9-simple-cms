@extends('layouts.auth')

@section('title')
    {{ trans('auth.password.title') }}
@stop

@section('content')

    <div class="login-box" id="login-box">

        <div class="header">
            <i class="fa fa-lock"></i> {{ trans('auth.password.title') }}
        </div>

        {!! Form::open(['method' => 'POST', 'route' => 'password.email']) !!}

        <div class="body bg-gray-50">

            @include('errors.validation')
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="form-group has-feedback">
                {!! Form::label('email', trans('auth.login.email')) !!}
                {!! Form::text('email', null, ['class' => 'form-control']) !!}
                <i class="fa fa-envelope form-control-feedback"></i>
            </div>

        </div>

        <div class="footer">
            {!! Form::submit(trans('auth.password.submit'), ['class' => 'btn bg-auth btn-block btn-flat']) !!}
            <hr/>
            <div class="row">
                <div class="col-xs-6">
                    <a class="btn btn-link" href="{{ route('auth.login') }}"> <i class="fa fa-sign-in"></i> {{ trans('auth.login.title') }}</a>
                </div>
            </div>
        </div>

        {!!  Form::close() !!}

    </div>

@endsection
