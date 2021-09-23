<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$kategori)
    {
        if (in_array($request->user()->kategori_user,$kategori)){
            return $next($request);
        }
        return redirect('/');
    }
}
