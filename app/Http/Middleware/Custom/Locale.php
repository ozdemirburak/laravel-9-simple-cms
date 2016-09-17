<?php

namespace App\Http\Middleware\Custom;

use App;
use App\Language;
use Carbon\Carbon;
use Closure;
use Config;
use Session;

class Locale
{
    /**
     * Store all languages in a config variable
     */
    public function __construct()
    {
        Config::set(['languages' => Language::all()]);
    }

    /**
     * Set locale
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $language = Session::get('language', Config::get('app.locale'));
        $current_lang = Language::whereCode($language)->firstOrFail();
        App::setLocale($language);
        Carbon::setLocale($language);
        Session::set('current_lang', $current_lang);
        return $next($request);
    }
}
