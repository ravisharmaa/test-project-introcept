<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
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
       /* $response  = $next($request);
        $response
            ->header('Access-Control-Allow-Origin',env('CLIENT_URL'))
            ->header('Access-Control-Allow-Origin-Methods','GET','PUT','POST','DELETE','OPTIONS');
        return $response;*/
        return $next($request)
			->header('Access-Control-Allow-Origin',env('CLIENT_URL'))
			->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
			->header('Access-Control-Max-Age', '1000')
			->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');
	}
}
