<?php namespace App\Http\Middleware;

use Closure;
use Session;
use App\Language;
use Config;
use App\Setting;

class SetConfiguration {

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
        $language = Session::get('language', Config::get('app.locale'));
        Config::set(['language' => Language::whereCode($language)->firstOrFail()]);
        Config::set(['settings' => Setting::firstOrFail()]);
        return $next($request);
    }

}