<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\GeneralTrait;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Auth;
class AuthController extends Controller
{
    use GeneralTrait;
    public function login(Request $request)
    {

        $rules = [
            'email'         => 'required|exists:users,email',
            'password'      => 'required'  
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code,$validator);
        }

        $cred = $request->only(['email','password']);
       
        $token = Auth::guard('admin-api')->attempt($cred);
        if(!$token)
            return $this->returnError('404','thier my be error ');
        $admin = Auth::guard('admin-api')->user();
        $admin->admin_token = $token;
        return $this->returnData('admin_token',$admin);
        
    }

    public function logout(Request $request)
    {
        $token  =  $request->header('token');
        if($token)
        {
            JWTAuth::setToken($token)->invalidate();
            return $this->returnSuccess('200','you Are logged out');
        }
        else
        return $this->returnError('404','Error ');
    }
}
