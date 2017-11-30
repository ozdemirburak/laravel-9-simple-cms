<?php

namespace App\Providers;

use Barryvdh\Debugbar\ServiceProvider as DebugbarServiceProvider;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Blade;
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
        /*
         * Laravel dd() function.
         *
         * Usage: @dd($variableToDump)
         */
        Blade::directive('dd', function ($expression) {
            return "<?php dd(with{$expression}); ?>";
        });

        /*
         * php explode() function.
         *
         * Usage: @explode($delimiter, $string)
         */
        Blade::directive('explode', function ($argumentString) {
            list($delimiter, $string) = $this->getArguments($argumentString);
            return "<?php echo explode({$delimiter}, {$string}); ?>";
        });

        /*
         * php implode() function.
         *
         * Usage: @implode($delimiter, $array)
         */
        Blade::directive('implode', function ($argumentString) {
            list($delimiter, $array) = $this->getArguments($argumentString);
            return "<?php echo implode({$delimiter}, {$array}); ?>";
        });

        /*
         * Symfony dump() function.
         *
         * Usage: @dump($variableToDump)
         */
        Blade::directive('dump', function ($expression) {
            return "<?php dump(with{$expression}); ?>";
        });

        /*
         * Set variable.
         *
         * Usage: @set($name, value)
         */
        Blade::directive('set', function ($argumentString) {
            list($name, $value) = $this->getArguments($argumentString);
            return "<?php {$name} = {$value}; ?>";
        });

        /*
         * Truncate string
         *
         * Usage: @truncate($string , integer)
         */
        Blade::directive('truncate', function ($expression) {
            list($string, $length) = $this->getArguments($expression);
            return "<?php echo e(strlen({$string}) > {$length} ? substr({$string},0,{$length}).'...' : {$string}); ?>";
        });

        /*
         * Easy font awesome
         *
         * Usage: @fa($icon , $class)
         */
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
    private function getArguments($argumentString, $removeQuote = false)
    {
        $replace = $removeQuote === true ? ['(', ')', '\''] : ['(', ')'];
        return explode(', ', str_replace($replace, '', $argumentString));
    }
}
