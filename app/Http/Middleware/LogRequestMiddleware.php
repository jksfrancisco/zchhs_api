<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class LogRequestMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Get the authenticated user (works with web, sanctum, or api guards depending on setup)
        $user = $request->user();

        Log::info('Request Log', [
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'ip' => $request->ip(),
            'user_id' => $user?->id ?? 'anonymous',
            'name' => $user?->name ?? 'anonymous',
            'email' => $user?->email ?? 'anonymous',
            'status' => $response->getStatusCode(),
        ]);

        return $response;
    }
}
