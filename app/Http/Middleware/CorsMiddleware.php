<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        // Define allowed origins (you can add more if needed)
        $allowedOrigins = explode(',', env('CORS_ALLOWED_ORIGINS', 'http://localhost:3000'));

        // Get the origin from the request headers
        $origin = $request->headers->get('Origin');

        // Check if the origin is allowed
        if (in_array($origin, $allowedOrigins)) {
            // Handle preflight requests
            if ($request->isMethod('OPTIONS')) {
                return response()->json(['message' => 'Preflight request'])
                    ->header('Access-Control-Allow-Origin', $origin)
                    ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                    ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, X-Token-Auth, Authorization');
            }

            // Handle regular requests
            return $next($request)
                ->header('Access-Control-Allow-Origin', $origin)
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, X-Token-Auth, Authorization');
        }

        // If origin is not allowed, deny the request
        return response()->json(['message' => 'Forbidden'], 403);
    }
}
