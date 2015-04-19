<?php namespace App\Http\Middleware;

use App\Language;
use Closure;
use Menu;

class MakeMenu {


    /**
     * Set menus in middleware as sessions are not stored already in service providers instead
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->makeAdminMenu();
        return $next($request);
    }

    protected function makeAdminMenu()
    {
        Menu::make('admin', function($menu) {
            $dashboard = $menu->add(trans('admin.menu.dashboard'), ['route' => 'admin.root'])
                ->icon('dashboard')
                ->prependIcon();

            $language  = $menu->add(trans('admin.menu.language.root'), '#')
                ->icon('flag')
                ->prependIcon();

            $language->add(trans('admin.menu.language.add'), ['route' => 'admin.language.create'])
                ->icon('circle-o')
                ->prependIcon();

            $language->add(trans('admin.menu.language.all'), ['route' => 'admin.language.index'])
                ->icon('circle-o')
                ->prependIcon();

            $pages = $menu->add(trans('admin.menu.page.root'), '#')
                ->icon('folder')
                ->prependIcon();

            $pages->add(trans('admin.menu.page.add'), ['route' => 'admin.page.create'])
                ->icon('circle-o')
                ->prependIcon();

            $pages->add(trans('admin.menu.page.all'), ['route' => 'admin.page.index'])
                ->icon('circle-o')
                ->prependIcon();

            $categories = $menu->add(trans('admin.menu.category.root'), '#')
                ->icon('book')
                ->prependIcon();

            $categories->add(trans('admin.menu.category.add'), ['route' => 'admin.category.create'])
                ->icon('circle-o')
                ->prependIcon();

            $categories->add(trans('admin.menu.category.all'), ['route' => 'admin.category.index'])
                ->icon('circle-o')
                ->prependIcon();

            $articles = $menu->add(trans('admin.menu.article.root'), '#')
                ->icon('edit')
                ->prependIcon();

            $articles->add(trans('admin.menu.article.add'), ['route' => 'admin.article.create'])
                ->icon('circle-o')
                ->prependIcon();

            $articles->add(trans('admin.menu.article.all'), ['route' => 'admin.article.index'])
                ->icon('circle-o')
                ->prependIcon();

            $users = $menu->add(trans('admin.menu.user.root'), '#')
                ->icon('users')
                ->prependIcon();

            $users->add(trans('admin.menu.user.add'), ['route' => 'admin.user.create'])
                ->icon('circle-o')
                ->prependIcon();

            $users->add(trans('admin.menu.user.all'), ['route' => 'admin.user.index'])
                ->icon('circle-o')
                ->prependIcon();

            $settings = $menu->add(trans('admin.menu.setting'), ['route' => 'admin.setting.index'])
                ->icon('gears')
                ->prependIcon();
        });
    }

}