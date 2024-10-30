<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiTokenAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {                
        $api_key = config('kanye.api_key');
        if (!!$api_key && $request->header('apitoken') != $api_key) {
          return response()->json('Unauthorized', 401);
        } 

        return $next($request);
    }
}
