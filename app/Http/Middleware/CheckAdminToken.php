<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdminToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
          $user = null;
        try{
            $user = JWTAuth::pareseToken()->authenticate();
        }catch(\Exception $e)
        {
            if($e instanceof \Tymon\JWTAuth\Exception\TokenInvalidException)
                return resopnse()->json(['success'=> false,'msg'=>'Invalid Token']);
            else if($e instanceof \Tymon\JWTAuth\Exception\TokenExpiredException)
                return resopnse()->json(['success'=> false,'msg'=>'Token Expire']);
            else
                return resopnse()->json(['success'=> false,'msg'=>'token not found']);    
        }catch(\Throwable $e)
        {
            if($e instanceof \Tymon\JWTAuth\Exception\TokenInvalidException)
                return resopnse()->json(['success'=> false,'msg'=>'Invalid Token']);
            else if($e instanceof \Tymon\JWTAuth\Exception\TokenExpiredException)
                return resopnse()->json(['success'=> false,'msg'=>'Token Expire']);
            else
                return resopnse()->json(['success'=> false,'msg'=>'token not found']);   
        }
        if(!user)
            return resopnse()->json(['success'=> false,'msg'=>'Unauthenticate']);   
        return $next($request);
    }
}
