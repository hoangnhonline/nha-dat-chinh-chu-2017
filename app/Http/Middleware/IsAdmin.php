<?php
namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    /**
     * Check role
     *
     * @param unknown $request
     * @param Closure $next
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (auth('backend')->user()->group_id != config('nhadat.admin_group_id')) {
            return response()->view('backend.dashboard.nopermission', [], 403);
        }

        return $response;
    }
}
