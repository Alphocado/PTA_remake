<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Http\Middleware\CheckRole1;
use App\Http\Middleware\CheckRole2;
use App\Http\Middleware\CheckRole3;

return Application::configure(basePath: dirname(__DIR__))
  ->withRouting(
    web: __DIR__ . '/../routes/web.php',
    commands: __DIR__ . '/../routes/console.php',
    health: '/up',
  )
  ->withMiddleware(function (Middleware $middleware) {
    $middleware->appendToGroup('check-role1', [
      CheckRole1::class,
    ]);
    $middleware->appendToGroup('check-role2', [
      CheckRole2::class,
    ]);
    $middleware->appendToGroup('check-role3', [
      CheckRole3::class,
    ]);
  })
  ->withExceptions(function (Exceptions $exceptions) {
    //
  })->create();
