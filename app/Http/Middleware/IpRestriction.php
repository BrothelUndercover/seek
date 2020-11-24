<?php

namespace App\Http\Middleware;

use Closure;
use App\IpList;

class IpRestriction
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
        if (IpList::checkIp($request->ip(),true)) {
            return $next($request);
        }
        return response('', 404);
    }
}
