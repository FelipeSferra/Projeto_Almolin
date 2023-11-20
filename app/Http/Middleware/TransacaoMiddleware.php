<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TransacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $allowedLevel = [1,2,3];
        if (!in_array(Auth::user()->level, $allowedLevel))
        {
            return redirect()->back()->with('error',__('Desculpe, você não tem autorização para acessar essa página.'));
        }
        return $next($request);
    }
}
