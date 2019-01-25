<?php

namespace App\Http\Middleware;

use Closure;

class RedirectPageOne
{
    /**
     * Set settings and language
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (request()->get('page') === '1') {
            return redirect(str_replace(['?page=1', '&page=1'], '', request()->fullUrl()));
        }
        return $next($request);
    }
}
