<?php

namespace App\Http\Middleware;

use Closure;
use App\Permissions;
class RoutePermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $form_id)
    {	$perm = new Permissions;
		if ($perm->allowedRoute($form_id))
			return $next($request);
		else
			return redirect('/sinacceso');
    }
}