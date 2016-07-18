<?php

namespace App\Http\Middleware\Custom;

use Closure;
use Menu;

class MakeMenu
{
    /**
     * @var string
     */
    private $circle = "circle-o";

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

    private function makeAdminMenu()
    {
        Menu::make('admin', function ($menu) {
            $menu->add($this->translate('dashboard'), ['route' => 'admin.root'])
                ->icon('dashboard')
                ->prependIcon();

            $language  = $menu->add($this->translate('language.root'), '#')
                ->icon('flag')
                ->prependIcon();

            $language->add($this->translate('language.add'), ['route' => 'admin.language.create'])
                ->icon($this->circle)
                ->prependIcon();

            $language->add($this->translate('language.all'), ['route' => 'admin.language.index'])
                ->icon($this->circle)
                ->prependIcon();

            $pages = $menu->add($this->translate('page.root'), '#')
                ->icon('folder')
                ->prependIcon();

            $pages->add($this->translate('page.add'), ['route' => 'admin.page.create'])
                ->icon($this->circle)
                ->prependIcon();

            $pages->add($this->translate('page.all'), ['route' => 'admin.page.index'])
                ->icon($this->circle)
                ->prependIcon();

            $categories = $menu->add($this->translate('category.root'), '#')
                ->icon('book')
                ->prependIcon();

            $categories->add($this->translate('category.add'), ['route' => 'admin.category.create'])
                ->icon($this->circle)
                ->prependIcon();

            $categories->add($this->translate('category.all'), ['route' => 'admin.category.index'])
                ->icon($this->circle)
                ->prependIcon();

            $articles = $menu->add($this->translate('article.root'), '#')
                ->icon('edit')
                ->prependIcon();

            $articles->add($this->translate('article.add'), ['route' => 'admin.article.create'])
                ->icon($this->circle)
                ->prependIcon();

            $articles->add($this->translate('article.all'), ['route' => 'admin.article.index'])
                ->icon($this->circle)
                ->prependIcon();

            $users = $menu->add($this->translate('user.root'), '#')
                ->icon('users')
                ->prependIcon();

            $users->add($this->translate('user.add'), ['route' => 'admin.user.create'])
                ->icon($this->circle)
                ->prependIcon();

            $users->add($this->translate('user.all'), ['route' => 'admin.user.index'])
                ->icon($this->circle)
                ->prependIcon();

            $menu->add($this->translate('setting'), ['route' => 'admin.setting.index'])
                ->icon('gears')
                ->prependIcon();
        });
    }

    private function translate($resource)
    {
        return '<span>' . trans('admin.menu.' . $resource) . '</span>';
    }
}
