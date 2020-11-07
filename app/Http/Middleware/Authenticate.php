<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;


class Authenticate extends Middleware
{
  public function handle($request, $next)
  {
    if (Auth::check()) {
      return $next($request);
    }

    return redirect('/login');
  }
  /**
   * Get the path the user should be redirected to when they are not authenticated.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return string|null
   */
  protected function redirectTo($request)
  {
    if (!$request->expectsJson()) {
      return route('login');
    }
  }
}
