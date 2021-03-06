<?php

namespace App\Http\Middleware;

use Closure;

class MustBeDutyAdvisor
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
        abort_unless(app('user')->isAdvisor(), 403);

        abort_unless(app('advisor')->duty, 403);

        return $next($request);
    }
}
