<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use Validator;

class AuthController extends Controller
{
  /**
   * Create user
   *
   * @param  Request  $request
   * @return JsonResponse [string] message
   */
  public function register(Request $request): ?JsonResponse
  {
      $request->validate([
          'name' => 'required|string',
          'email' => 'required|string|email|unique:users',
          'password' => 'required|string|',
          'c_password'=>'required|same:password',
      ]);

      $user = new User([
          'name' => $request->name,
          'email' => $request->email,
          'password' => bcrypt($request->password)
      ]);
      if($user->save()){
          return response()->json([
              'message' => 'Successfully created user!'
          ], 201);
      }

    return response()->json(['error'=>'Provide proper details']);
  }

  /**
   * Login user and create token
   *
   * @param  Request  $request
   * @return JsonResponse [string] access_token
   */
    public function login(Request $request): JsonResponse
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

  /**
   * Logout user (Revoke the token)
   *
   * @param  Request  $request
   * @return JsonResponse [string] message
   */
    public function logout(Request $request): JsonResponse
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

  /**
   * Get the authenticated User
   *
   * @param  Request  $request
   * @return JsonResponse [json] user object
   */
    public function user(Request $request): JsonResponse
    {
      return response()->json($request->user());
    }
}

