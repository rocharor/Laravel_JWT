<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiJwtMiddleware
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
        try {
            JWTAuth::parseToken()->authenticate();
        } catch(\Exception $e) {
            if ($e instanceof TokenBlacklistedException || $e instanceof TokenExpiredException) {
                return response()->json(['status' => 'Token expirado.']);
            } elseif ($e instanceof TokenInvalidException) {
                return response()->json(['status' => 'Token Inválido.']);
            } else {
                return response()->json(['status' => 'Token não informado.']);
            }
        }

        return $next($request);
    }
}
