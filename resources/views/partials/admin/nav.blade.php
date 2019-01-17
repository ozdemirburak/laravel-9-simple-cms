<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
    <div class="container is-fluid">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ route('root') }}">
                <span class="icon">{!! icon('home') !!}</span>
                <span>{{ config('settings.site_title') }}</span>
            </a>
            <button onclick="document.querySelector('.navbar-menu').classList.toggle('is-active');" class="button is-dark navbar-burger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
        <div class="navbar-menu">
            <div class="navbar-start">
                @include('partials.admin.nav.single', ['link' => route('admin.dashboard.index'), 'text' => __('admin.dashboard.index'), 'icon' => 'target'])
                @include('partials.admin.nav.dropdown', ['resource' => 'article', 'icon' => 'book'])
                @include('partials.admin.nav.dropdown', ['resource' => 'category', 'icon' => 'bookmark'])
                @include('partials.admin.nav.dropdown', ['resource' => 'page', 'icon' => 'file'])
                @include('partials.admin.nav.dropdown', ['resource' => 'user', 'icon' => 'users'])
                <!--  Do not remove line NAVIGATION_FLAG if you want to use CMS generator properly -->
                <!-- Check the file app/Console/Commands/Cms/Resource.php -->
				<!--NAVIGATION_FLAG-->
                @include('partials.admin.nav.single', ['link' => route('elfinder.index'), 'text' => __('admin.elfinder.index'), 'icon' => 'film'])
                @include('partials.admin.nav.logout', ['class' => 'is-hidden-tablet'])
             </div>
        </div>
        <div class="navbar-end is-hidden-mobile">
            @include('partials.admin.nav.logout')
        </div>
    </div>
</nav>
