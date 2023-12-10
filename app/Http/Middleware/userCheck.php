<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next, ...$guards)
    // {
    //     if (session()->has('email')) {
    //         return $next($request);
    //     }
    //     return redirect('/login');
    // }
    public function handle(Request $request, Closure $next)
    {
       if(!session()->has('email') && ($request->path() != '/')){
        return redirect('/')->with('fail','You must be logged in');
       }
       if(session()->has('email') && ($request->path() == '/')){
        return redirect('dashboard');
       }
       return $next($request)->header('Cache-Control','no-cache,no-store, max-age=0, must-revalidate')
                             ->header('Pragma','no-cache')
                             ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
    }
}
