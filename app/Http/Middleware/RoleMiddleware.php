<?php

namespace App\Http\Middleware;

use Closure;
use App\Repositories\RoleRepository;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(!$request->user()->userRole()->join('roles', 'user_roles.role_id', '=', 'roles.id')->where('roles.name',$role)->first())
            return redirect('/')->withErrors(['You are unauthorized']);
        return $next($request);
    }
}
