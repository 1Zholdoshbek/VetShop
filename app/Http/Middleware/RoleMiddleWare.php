<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if(!$user)
        {
            return redirect('/')->with('error', 'You do not have access to this page.');
        }
        if ($user->role != User::$ADMIN) {
            return redirect('/')->with('error', 'You do not have access to this page.');
        }
        return $next($request);
    }
}
