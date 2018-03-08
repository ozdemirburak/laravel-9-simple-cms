<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            @include('partials.admin.nav.single', ['link' => route('admin.root'), 'icon' => 'dashboard', 'text' => trans('admin.dashboard.index')])
            @include('partials.admin.nav.dropdown', ['resource' => 'language', 'icon' => 'flag'])
            @include('partials.admin.nav.dropdown', ['resource' => 'page', 'icon' => 'folder'])
            @include('partials.admin.nav.dropdown', ['resource' => 'category', 'icon' => 'book'])
            @include('partials.admin.nav.dropdown', ['resource' => 'article', 'icon' => 'edit'])
            @include('partials.admin.nav.dropdown', ['resource' => 'user', 'icon' => 'users'])
            @include('partials.admin.nav.single', ['resource' => 'setting', 'icon' => 'gears'])
        </ul>
    </section>
</aside>
