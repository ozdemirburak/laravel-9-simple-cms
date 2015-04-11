<?php namespace App\Http\Middleware;

use Session;
use Closure;
use App;
use Carbon\Carbon;
use Config;

class Locale {

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
        App::setLocale($language);
        Carbon::setLocale($language);
        return $next($request);
    }

}