<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'role' => \App\Http\Middleware\RoleMiddleware::class,
            'prevent.logout' => \App\Http\Middleware\PreventLogoutOnNavigation::class,
            'pendaftar.auth' => \App\Http\Middleware\RedirectIfUnauthenticated::class,
        ]);
        
        // Replace default CSRF middleware
        $middleware->validateCsrfTokens(except: [
            // Add any routes that should be exempt from CSRF verification
        ]);
        
        // Prevent logout middleware is applied per route group
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
