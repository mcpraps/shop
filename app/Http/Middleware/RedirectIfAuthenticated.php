<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

/**
 * Class RedirectIfAuthenticated
 *
 * @package App\Http\Middleware
 * @author Kovacs Mate
 * @copyright 2022 Kovacs Mate
 */
class RedirectIfAuthenticated {


    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param string|null  ...$guards
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards) {
        foreach (config('auth.guards') as $guard => $value) {
            if (Auth::guard($guard)->check()) {
				return $guard === 'admin_users' ? redirect(RouteServiceProvider::DASHBOARD) : redirect()->back();
            }
        }

        return $next($request);
    }


}
