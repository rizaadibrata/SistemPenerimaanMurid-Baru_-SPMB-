<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class PreventLogoutOnNavigation
{
    public function handle(Request $request, Closure $next)
    {
        // Extend session lifetime for authenticated users in pendaftaran routes
        if (Auth::check() && $request->is('pendaftaran/*')) {
            // Extend session lifetime to 8 hours for pendaftaran area
            Config::set('session.lifetime', 480);
            
            // Update last activity
            $request->session()->put('last_activity', time());
            
            // Regenerate session ID periodically to prevent fixation
            if (!$request->session()->has('last_regeneration') || 
                (time() - $request->session()->get('last_regeneration', 0)) > 1800) { // 30 minutes
                $request->session()->regenerate();
                $request->session()->put('last_regeneration', time());
            }
        }
        
        return $next($request);
    }
}