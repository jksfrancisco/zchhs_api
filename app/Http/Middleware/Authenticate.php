<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            if (!$request->expectsJson()) {
                return response()->view('errors.unauthorized', [], 401);
            }

            return response()->json(['message' => 'Unauthenticated.'], 401);
        }

        return $next($request); 
    }
}
