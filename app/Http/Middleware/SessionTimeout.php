<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
       protected $timeout = 300; // 5 minutes = 300 seconds

    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return $next($request);
        }

        $lastActivity = Session::get('lastActivityTime');

        if ($lastActivity && (time() - $lastActivity) > $this->timeout) {
            Auth::logout();
            Session::flush();

            return redirect('/login')->withErrors(['message' => 'You were logged out due to inactivity.']);
        }

        Session::put('lastActivityTime', time());

        return $next($request);
    }
}
