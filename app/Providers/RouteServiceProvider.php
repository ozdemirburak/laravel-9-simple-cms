<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

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
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/admin';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();
        $this->bootRouteModelBinders();
        $this->bootRouteParameterBinders();
    }

    /**
     * Do not remove GENERATOR_MODEL_BINDER if you want to use CMS generator properly
     * Check the file app/Console/Commands/Cms/Resource.php
     *
     * @return void
     */
    private function bootRouteModelBinders()
    {
        Route::model('article', Article::class);
        Route::model('category', Category::class);
        Route::model('page', Page::class);
        Route::model('user', User::class);
        /** GENERATOR_MODEL_BINDER **/
    }

    /**
     * Do not remove GENERATOR_PARAMETER_BINDER if you want to use CMS generator properly
     * Check the file app/Console/Commands/Cms/Resource.php
     *
     * @return void
     */
    private function bootRouteParameterBinders()
    {
        Route::bind('aSlug', function ($slug) {
            return Article::with('category')->where('slug', $slug)->firstOrFail();
        });
        Route::bind('cSlug', function ($slug) {
            return Category::with('articles')->where('slug', $slug)->firstOrFail();
        });
        Route::bind('pSlug', function ($slug) {
            return Page::with('parent')->where('slug', $slug)->firstOrFail();
        });
        /** GENERATOR_PARAMETER_BINDER **/
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapAdminRoutes();
        $this->mapApiRoutes();
        $this->mapWebRoutes();
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
            ->namespace($this->authNamespace)
            ->prefix('auth')
            ->group(base_path('routes/auth.php'));
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
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

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60);
        });
    }
}
