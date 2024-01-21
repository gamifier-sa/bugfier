<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\{App, Config};


class SetLocale
{
    public function handle($request, Closure $next)
    {
        if (session('theme_lang'))
            App::setLocale(session('theme_lang'));
        else
            App::setLocale(Config::get('app.locale'));

        return $next($request);
    }
}
