<?php

namespace App\Http\Middleware\Custom;

use App\Language;
use App\Setting;
use Closure;
use Config;

class SetConfiguration
{
    public function __construct()
    {
        //
    }

    /**
     * Set settings and language
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Config::set(['settings' => Setting::firstOrFail(), 'languages' => Language::all()]);
        return $next($request);
    }
}
