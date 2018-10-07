<?php

namespace App\Providers;

use Barryvdh\Debugbar\ServiceProvider as DebugbarServiceProvider;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Blade;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapThree();

        // Font Awesome: @fa($icon , $class)
        Blade::directive('fa', function ($expression) {
            if (strpos($expression, ',') !== false) {
                list($icon, $class) =  $this->getArguments($expression, true);
                $icon = "<i class='fa fa-{$icon} fa-{$class}'></i>";
            } else {
                $icon = str_replace(['(', ')', '\''], '', $expression);
                $icon = "<i class='fa fa-{$icon}'></i>";
            }
            return "<?php echo \"{$icon}\"; ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(IdeHelperServiceProvider::class);
            $this->app->register(DebugbarServiceProvider::class);
        }
    }

    /**
     * Get argument array from argument string.
     *
     * @param string $argumentString
     * @param bool   $removeQuote
     *
     * @return array
     */
    private function getArguments($argumentString, $removeQuote = false): array
    {
        $replace = $removeQuote === true ? ['(', ')', '\''] : ['(', ')'];
        return explode(', ', str_replace($replace, '', $argumentString));
    }
}
