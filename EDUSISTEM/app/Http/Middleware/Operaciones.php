<?php

namespace App\Http\Middleware;

use Closure;

class Operaciones
{
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth=$auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->auth->user()->operaciones())
        {        
        return $next($request);
        } else{
            abort(401);
        }

    }
}
