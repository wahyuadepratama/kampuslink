<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\ApiAccess as Api;

class ApiAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $check = Api::where('token', $request->route('token'))->first();
      if(isset($check)){
        return $next($request);
      }else{
        return response()->json(['error' => 'invalid client_id, please contact administrator to get token client'], 400);
      }
    }
}
