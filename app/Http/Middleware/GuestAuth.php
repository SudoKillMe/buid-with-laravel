<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class GuestAuth
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
        if (!session('login')) {
            session(['user' => User::where(['name' => 'techer'])->first()]);
        } else {
            //刷新session里user的内容
            $old_user = session('user')['id'];
            dd(session());
            session(['user' => User::find($old_user)]);
        }
        return $next($request);
    }
}
