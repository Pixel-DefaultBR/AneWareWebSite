<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Block404Routes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, Response $response): Response
    {
        if($response->getStatusCode() === 404) {
            abort(404, 'Pagina nao encontrada');
        }

        return $next($request);
    }
}
