<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request){
        $user = User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role_id' => 1,
        ]);
        return response()->json([
            'user' => new UserResource($user),
            'status' =>203,
        ]);
    }
    public function login(Request $request){
        $credentials = Auth::attempt($request->only('email','password'));
        if(!$credentials){
            return response()->json([
                'message' => 'bad credentials',
                'status' => 401,
            ]);
        }
        /** @var $user */
        $user = Auth::user();
        $token = $user->createToken('myToken')->plainTextToken;
        return response()->json([
            'token' => $token,
            'user' => new UserResource($user),
        ]);
    }
    public function user(Request $request){
        return $request->user();
    }
    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'logged out'
        ]);
    }
}
