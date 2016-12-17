<?php

namespace App\Http\Middleware;

use Closure;
use App\Statistic;

class Statistics
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request 
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //dd(session('statistics'));
        if (!session('statistics')) {
            Statistic::increase();
            session(['statistics' => 'fuck']);

        }
        return $next($request);
    }
}
