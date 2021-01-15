<?php

namespace App\Http\Middleware;

use Closure;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\facades\JWTAuth;

class JWT
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
       try{
           JWTAuth::parseToken()->authenticate();
       }catch (\Exception $e){
            if($e instanceof TokenExpiredException){
                $newtoken = JWTAuth::parseToken()->refresh();
                return response()->json(['success'=>false,'token'=>$newtoken,'status'=>'expired'],401);
            }elseif ($e instanceof TokenInvalidException){
                return response()->json(['success'=>false,'message'=>'token Invalid'],401);
            }else{
                return response()->json(['success'=>false,'message'=>'token not found'],401);
            }
       }
        return $next($request);
    }
}
