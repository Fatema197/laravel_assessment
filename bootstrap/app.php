<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpFoundation\Response;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        api: __DIR__.'/../routes/api.php',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->respond(function (Response $response) {
            if ($response->getStatusCode() == 401) { 
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthenticated',
                ], 401);
            } else if ($response->getStatusCode() == 403) { 
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized access',
                ], 403);
            } else if ($response->getStatusCode() == 404) { 
                return response()->json([
                    'status' => 'error',
                    'message' => 'Not found',
                ], 404);
            } else if ($response->getStatusCode() == 422) { 
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation Error',
                ], 422);
            } else if ($response->getStatusCode() == 500) { 
                return response()->json([
                    'status' => 'error',
                    'message' => 'Internal Server Error',
                ], 500);
            }
     
            return $response;
        });
    })
    ->create();
