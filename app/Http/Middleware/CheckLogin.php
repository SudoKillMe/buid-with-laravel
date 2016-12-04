<?php

namespace App\Http\Middleware;

use Illuminate\Encryption\Encrypter;

use Closure;
use App\User;
class CheckLogin
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
        // if (empty($request->cookie('user')) && $request->path() != '/') {
        //     return redirect('/');
        // }
        if ($name = $request->cookie('user')) {
            if (!session('user')) {
                $user = User::where('name', $name)->first();
                session('user', $user);
            }
        }
        return $next($request);
    }
}
