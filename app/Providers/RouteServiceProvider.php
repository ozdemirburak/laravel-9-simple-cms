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
        $this->bootRouteModelBinders();
        $this->bootRouteParameterBinders();
    }

    /**
     * @return void
     */
    private function bootRouteModelBinders()
    {
        Route::model('article', Article::class);
        Route::model('category', Category::class);
        Route::model('language', Language::class);
        Route::model('page', Page::class);
        Route::model('setting', Setting::class);
        Route::model('user', User::class);
    }

    /**
     * @return void
     */
    private function bootRouteParameterBinders()
    {
        Route::bind('articleSlug', function ($slug) {
            return Article::with('category')->where('slug', '=', $slug)->firstOrFail();
        });
        Route::bind('categorySlug', function ($slug) {
            return Category::with('articles')->where('slug', '=', $slug)->firstOrFail();
        });
        Route::bind('pageSlug', function ($slug) {
            return Page::findBySlugOrFail($slug);
        });
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
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
        Route::middleware('web')
            ->namespace($this->authNamespace)
            ->prefix('auth')
            ->group(base_path('routes/auth.php'));
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
        Route::middleware('api')
            ->as('api.')
            ->namespace($this->apiNamespace)
            ->prefix('api')
            ->group(base_path('routes/api.php'));
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
        Route::middleware('admin')
            ->as('admin.')
            ->namespace($this->adminNamespace)
            ->prefix('admin')
            ->group(base_path('routes/admin.php'));
    }
}
