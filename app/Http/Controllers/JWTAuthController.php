<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Users;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Contracts\JWTSubject;

class JWTAuthController extends Controller implements JWTSubject
{
  public $firstname;
  public $lastname;
  public $email;

  public function __construct()
  {
    $this->middleware('auth:api', ['except' => ['login']]);
  }

  public function getJWTIdentifier()
  {
    return $this->getKey();
  }

  public function getJWTCustomClaims()
  {
    return [
      'firstname' => $this->firstname,
      'lastname' => $this->lastname,
      'email' => $this->email
    ];
  }

  public function register(Request $request): JsonResponse
  {
    $validator = Validator::make($request->all(), [
      'userName' => 'required|string|max:100',
      'email' => 'required|email|max:255|unique:users',
      'password' => 'required|string|min:8|max:255|confirmed',
      'password_confirmation' => 'required|string|min:8|max:255',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => 'error',
        'messages' => $validator->messages()
      ], 200);
    }

    $user = new Users;
    $user->fill($request->all());
    $user->userTagId = 1;
    $user->phone = str_replace('-', '', $request->phone);
    $user->save();

    return response()->json([
      'status' => 'success',
      'data' => $user
    ], 200);
  }

  public function login(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'email' => 'required|email|max:255',
      'password' => 'required|string|min:8|max:255',
    ]);

    if ($validator->fails()) {
      return response()->json([
        'status' => 'error',
        'messages' => $validator->messages()
      ], 200);
    }

    if (!$token = Auth::guard('api')->attempt(['email' => $request->email, 'password' => $request->password])) {
      return response()->json(['error' => 'Unauthorized'], 401);
    }

    return '$token';
    // return $this->respondWithToken($token);
  }

  public function guard()
  {
    return Auth::guard();
  }

  protected function respondWithToken($token)
  {
    return response()->json([
      'access_token' => $token,
      'token_type' => 'bearer',
      'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
    ]);
  }
}
