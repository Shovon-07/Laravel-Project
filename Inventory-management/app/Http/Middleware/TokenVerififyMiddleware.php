<?php

namespace App\Http\Middleware;

use App\Helper\JWTHelper;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenVerififyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('token');
        $result = JWTHelper::verifyToken($token);

        if ($result === 'Unauthorized') {
            return redirect('/admin/');
        } else {
            $request->headers->set('id', $result->userId);
            $request->headers->set('email', $result->userEmail);
            return $next($request);
        }
    }
}
