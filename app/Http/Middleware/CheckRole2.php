<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole2
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    // Check apakah sudah login atau belum
    if (!Auth::check()) {
      return redirect('/login'); // langsung pindah ke login
    }

    if (!(auth()->user()->role >= 2)) {
      return abort(403, 'Unauthorized');
    }

    return $next($request);
  }
}
