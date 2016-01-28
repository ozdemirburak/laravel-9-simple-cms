<?php

namespace App\Providers;

use App\Article;
use App\Category;
use App\Page;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        parent::boot($router);
        $router->model('article', 'App\Article');
        $router->bind('article_slug', function ($slug) {
            return Article::findBySlugOrFail($slug);
        });
        $router->model('category', 'App\Category');
        $router->bind('category_slug', function ($slug) {
            return Category::findBySlugOrFail($slug);
        });
        $router->model('language', 'App\Language');
        $router->model('page', 'App\Page');
        $router->bind('page_slug', function ($slug) {
            return Page::findBySlugOrFail($slug);
        });
        $router->model('setting', 'App\Setting');
        $router->model('user', 'App\User');
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
