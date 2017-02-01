<?php

namespace App\Http\Middleware\Custom;

use App;
use App\Language;
use Carbon\Carbon;
use Closure;
use Config;

class Locale
{
    /**
     * Set locale
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->setLocale($language = session('language', Config::get('app.locale')));
        session(['current_lang' => Language::whereCode($language)->firstOrFail()]);
        return $next($request);
    }

    /**
     * @param $language
     */
    private function setLocale($language)
    {
        App::setLocale($language);
        Carbon::setLocale($language);
    }
}
