<?php

namespace Modules\Auth\Http\Controllers\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\ApiBaseController;
use App\Models\User;

class LoginController extends ApiBaseController
{
    public function login(Request $request)
    {
        try {
            $login = $request->validate([
                'email' => 'required|string|',
                'password' => 'required|string',
            ]);
            if (!Auth::attempt($login)) {
                return $this->errorResponse("Invalid login credentials", 500);
            }

            $accessToken = Auth::user()->createToken('authToken')->accessToken;
            $user = Auth::user();
            if (isset($user->image)) {
                $user->image = asset('/storage/user/' . $user->id . '/' . $user->image);
            }
            $data = ['user' => $user, 'access_token' => $accessToken];
            return $this->successData("success",$data,200);
        } catch (\Exception $e) {
            return $e;
            return $this->errorData("server error",$e,500);
        }
    }

    public function logout(Request $request)
    {
        try{
            $tokens=$request->user()->tokens;
            foreach($tokens as $token){
                $token->delete();
            }
            return $this->successResponse('Logged Out Successfully !',200);
        }
        catch(\Exception $e){
            return $this->errorData("server error", $e, 500);
        }
    }
}
