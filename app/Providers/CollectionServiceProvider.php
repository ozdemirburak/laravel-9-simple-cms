<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class CollectionServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Collection::macro('pipe', function ($callback) {
            return $callback($this);
        });

        Collection::macro('dd', function () {
            dd($this);
        });

        Collection::macro('clear', function () {
            return [];
        });

        Collection::macro('recollect', function ($items) {
            return collect($items);
        });
    }
}
