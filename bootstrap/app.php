<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Http\Middleware\VerifyAccessKey;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        api: __DIR__.'/../routes/api.php',
    )
    
    ->withMiddleware(function (Middleware $middleware): void {
        // Apply API key verification only to API routes, not to web routes
        $middleware->appendToGroup('api', VerifyAccessKey::class);
    })

    ->withExceptions(function (Exceptions $exceptions): void {
         $exceptions->renderable(function (NotFoundHttpException $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 404);
        });
    })->create();
