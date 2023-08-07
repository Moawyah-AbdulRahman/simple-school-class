<?php

namespace App\Http\Middleware;

use Tymon\JWTAuth\Facades\JWTAuth;
use App\Exceptions\BusinessException;
use Closure;
use Illuminate\Http\Request;

class JWTAuthenticationMiddleware {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) {
        $token = explode(' ', $request->header('Authorization'))[1];

        try {
            if(JWTAuth::setToken($token)->authenticate()) {
                $response = $next($request);
    
                $newToken = JWTAuth::refresh();
                $response->header('accessToken', $newToken);
    
                return $response;
            }
        } catch(\Tymon\JWTAuth\Exceptions\JWTException $e) {
            throw new BusinessException('Bad Credentials.', 401);
        }
    }   

}
