<?php

namespace KC\Http\Controllers\Api;

use Tymon\JWTAuth\Exceptions\JWTException;
use KC\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use KC\Http\Requests;
use JWTAuth;

class AuthController extends Controller
{
    public function authenticate(Request $request) {
      $credentials = $request->only(['email','password']);

      try {
        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
      } catch (JWTException $e) {
        return response()->json(['error' => 'could_not_create_token'], 500);
      }

      return response()->json(compact('token'));
    }
}
