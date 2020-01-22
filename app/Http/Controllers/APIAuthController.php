<?php

namespace App\Http\Controllers;

use App\Tweet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;


class APIAuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = JWTAuth::attempt($credentials);
        //Checking If is old user from md5 hashed
        $this->convertMd5ToBcrypt($token, $request);
        $token = JWTAuth::attempt($credentials);
        if (!$token) {
            return response([
                'status' => 'error',
                'error' => 'invalid.credentials',
                'msg' => 'Invalid Credentials.',
            ], 401);
        }
        return response([
            'status' => 'success',
            'userInfo' => $this->getUserInfo()
        ])->header('Authorization', $token);
    }

    public function getUserInfo()
    {
        $user = User::find(Auth::user()->id);
        $user->hasTweetAccess = (new Tweet())->isAllowed();
        return $user;
    }

    public function user(Request $request)
    {
        return response([
            'status' => 'success',
            'userInfo' => $this->getUserInfo()
        ]);
    }

    public function refresh()
    {
        return response([
            'status' => 'success'
        ]);
    }

    public function logout()
    {
        JWTAuth::invalidate();
        return response([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }

    public function convertMd5ToBcrypt($token, $request)
    {
        if (!$token) {
            $user = User::where('email', $request->email)->first();
            if ($user && $user->password == md5($request->password)) {
                $user->password = \Hash::make($request->password);
                $user->save();
            }
        }
        return $token;
    }
}
