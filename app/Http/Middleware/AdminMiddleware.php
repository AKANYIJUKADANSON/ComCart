<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // Check to make sure that the logged in user is an admin
        if(!Auth::user()->role =='1'){
            // if they dont have admin rights, redirect to home page
            return redirect('/home')->with('message', 'Access denied, You have no Admin rights');
        }
        return $next($request);
    }
}
