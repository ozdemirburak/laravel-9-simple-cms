<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \Illuminate\Auth\Events\Login::class => [
            \App\Listeners\SetUserLoginCredentials::class,
        ],
        \Illuminate\Auth\Events\Logout::class => [
            \App\Listeners\SetUserLogoutCredentials::class,
        ],
        \App\Events\ArticleWasViewed::class => [
            \App\Listeners\IncrementArticleViews::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        //
    }
}
