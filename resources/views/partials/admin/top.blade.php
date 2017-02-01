@php $currentUser = Auth::user() @endphp

<header class="main-header">
    <a href="{{ route('admin.root') }}" class="logo"> {{ trans('admin.title')  }}</a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img class="user-image img-circle" src="{{ $currentUser->picture }}" alt="{{ $currentUser->name }}" />
                        <span class="hidden-xs">{{ $currentUser->name  }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img class="img-circle" src="{{ $currentUser->picture }}" alt="{{ $currentUser->name }}" />
                            <p>{{ $currentUser->name  }}</p>
                            @include('partials.common.languages', ['languages' => config('languages'), 'route' => 'admin.language.change' ])
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('root')  }}" class="btn btn-default btn-flat">
                                    @fa('globe') {{ trans('application.home') }}
                                </a>
                            </div>
                            <div class="pull-right">
                                {!! Form::open(['method' => 'POST', 'route' => 'auth.logout']) !!}
                                    <button type="submit" class="btn btn-default btn-flat">
                                        @fa('sign-out') {{ trans('auth.logout') }}
                                    </button>
                                {!! Form::close() !!}
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
