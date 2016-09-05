<?php

namespace App\Providers;

use App\Article;
use App\Category;
use App\Language;
use App\Page;
use App\Setting;
use App\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers\Application';

    /**
     * @var string
     */
    protected $authNamespace = 'App\Http\Controllers\Auth';

    /**
     * @var string
     */
    protected $apiNamespace = 'App\Http\Controllers\Api';

    /**
     * @var string
     */
    protected $adminNamespace = 'App\Http\Controllers\Admin';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        Route::model('article', Article::class);
        Route::bind('article_slug', function ($slug) {
            return Article::findBySlugOrFail($slug);
        });
        Route::model('category', Category::class);
        Route::bind('category_slug', function ($slug) {
            return Category::findBySlugOrFail($slug);
        });
        Route::model('language', Language::class);
        Route::model('page', Page::class);
        Route::bind('page_slug', function ($slug) {
            return Page::findBySlugOrFail($slug);
        });
        Route::model('setting', Setting::class);
        Route::model('user', User::class);
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapWebRoutes();
        $this->mapApiRoutes();
        $this->mapAdminRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/web.php');
        });
        Route::group([
            'prefix' => 'auth',
            'middleware' => 'web',
            'namespace' => $this->authNamespace,
        ], function ($router) {
            require base_path('routes/auth.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace' => $this->apiNamespace,
            'prefix' => 'api',
        ], function ($router) {
            require base_path('routes/api.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::group([
            'as' => 'admin.',
            'middleware' => 'admin',
            'namespace' => $this->adminNamespace,
            'prefix' => 'admin',
        ], function ($router) {
            require base_path('routes/admin.php');
        });
    }
}
