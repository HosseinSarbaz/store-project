<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->check()){
            return redirect()->route('Auth.RegisterForm');
        }

        if(auth()->user()->role === 'user' ){
            // return redirect()->route('Home.index')->with('404', 'شما نمیتوانید به این صفحه دسترسی پیدا کنید');
            abort(403,'you are Forbidden');
        }

        return $next($request);

    }
}
