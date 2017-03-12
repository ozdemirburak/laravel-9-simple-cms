<?php

namespace App\Http\Middleware\Custom\Admin;

use Closure;
use Menu;

class MakeMenu
{
    /**
     * @var string
     */
    protected $circle = 'circle-o';

    /**
     * @var \Caffeinated\Menus\Facades\Menu
     */
    protected $menu;

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

    /**
     * Create the admin menu
     */
    protected function makeAdminMenu()
    {
        Menu::make('admin', function ($menu) {
            $this->menu = $menu;
            $menu->add($this->translate('dashboard', 'index'), ['route' => $this->implode('root')])->icon('dashboard')->prependIcon();
            $this->add('language', 'flag');
            $this->add('page', 'folder');
            $this->add('category', 'book');
            $this->add('article', 'edit');
            $this->add('user', 'users');
            $menu->add($this->translate('setting', 'index'), ['route' => $this->implode('setting', 'index')])->icon('gears')->prependIcon();
        });
    }

    /**
     * @param $model
     * @param $icon
     */
    protected function add($model, $icon)
    {
        $object = $this->menu->add($this->translate($model, 'index'), '#')
            ->icon($icon)
            ->prependIcon();

        $object->add($this->translate($model, 'create'), ['route' => $this->implode($model, 'create')])
            ->icon($this->circle)
            ->prependIcon();

        $object->add($this->translate($model, 'all'), ['route' => $this->implode($model, 'index')])
            ->icon($this->circle)
            ->prependIcon();
    }

    /**
     * @param        $model
     * @param string $path
     *
     * @return \Illuminate\Contracts\Translation\Translator|string
     */
    private function translate($model, $path = '')
    {
        return trans($this->implode($model, $path, true));
    }


    /**
     * @param        $model
     * @param string $path
     * @param bool   $isMenu
     *
     * @return string
     */
    private function implode($model, $path = '', $isMenu = false)
    {
        return implode('.', array_filter(['admin', $isMenu ? 'menu' : '', $model, $path]));
    }
}
