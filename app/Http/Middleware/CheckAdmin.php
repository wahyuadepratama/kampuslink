<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{

  public function handle($request, Closure $next)
  {
    if(Auth::user()->role_id == 2) {
      if(Auth::user()->status == 2){
        return abort(406);
      }else{
        return $next($request);
      }
    }else {
        return abort(404);
    }
  }
}
