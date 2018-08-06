<?php

namespace App\Http\Middleware;

use Closure;

class notPageAdmin
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
        if (\Request::segment(1) !== BULK_SYSTEM) {
            return $next($request);
        }
        return redirect()->route('admin404');
    }
}
