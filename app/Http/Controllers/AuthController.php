<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public  function register(Request $request)
    {
        $validate = Validator::make($request->all(),[
           'username' => 'required|unique:users,username',
           'password' => 'required|min:6',
        ]);

        if($validate->fails())return response()->json($validate->errors(),400);

        User::query()->create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        if(!$token = Auth::attempt($request->only('username','password'))){
            return  response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        return response()->json([
            'status' => true,
            'token' => $token,
        ]);
    }


    public function login(Request $request)
    {
        if(!$token = Auth::attempt($request->only('username','password'))){
            return  response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ]);
        }

        return response()->json([
            'status' => true,
            'token' => $token,
        ]);
    }

    public  function  logout()
    {
        Auth::logout();
        return response()->json([
            'status' => true,
            'message' => 'Successfully logged out'
        ]);
    }


    public function me()
    {
        return response()->json(Auth::user());
    }


    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }


    public  function invalidate()
    {
        return response()->json([
            'status' => false,
            'message' => 'Unauthorized'
        ]);
    }
}
