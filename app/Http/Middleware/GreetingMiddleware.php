<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GreetingMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $currentTime = time();
        $timeOfDay = '';

        if ($currentTime < strtotime('12:00')) {
            $timeOfDay = 'Pagi';
        } else if ($currentTime < strtotime('14:00')) {
            $timeOfDay = 'Siang';
        } else if ($currentTime < strtotime('18:00')) {
            $timeOfDay = 'Sore';
        } else {
            $timeOfDay = 'Malam';
        }

        view()->share('timeOfDay', $timeOfDay);

        return $next($request);
    }
}
