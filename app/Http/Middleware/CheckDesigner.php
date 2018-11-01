<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CheckDesigner
{
    public function handle($request, Closure $next)
    {
      if(Auth::user()->role_id == 2) {
          return $next($request);
      }else {
          return abort(404);
      }
    }
}
