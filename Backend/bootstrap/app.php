<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Ejemplo: Middleware global, si lo necesitas
        // $middleware->append(EnsureFrontendRequestsAreStateful::class);
        
        // Middleware de rutas (lo más común con Sanctum)
        $middleware->alias([
            'auth:sanctum' => \Laravel\Sanctum\Http\Middleware\Authenticate::class,
            // Puedes agregar más alias aquí si necesitas
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
