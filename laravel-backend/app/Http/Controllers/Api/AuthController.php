<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Check validator
        $validator = Validator::make($request->all(),[
            'fullname' => 'required|string',
            'username' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'tel' => 'required',
            'role' => 'required|integer'
        ]);

        // If validate fails
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        // Create data
        $user = User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'tel' => $request->tel,
            'avatar' => $request->avatar,
            'role' => $request->role
        ]);

        // Return message and data
        // return response()->json(['User created successfully', new UserResource($user)]);

        $token = $user->createToken($request->userAgent(), ["$user->role"])->plainTextToken;
        $response = [
            'message' => "User created successfully",
            'data' => $user,
            'token' => $token
        ];
        return response($response, 201);

    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email',$fields['email'])->first();
        // Chect password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Invalid Login'
            ], 401);
        } else {
            $user->tokens()->delete(); // ลบ Token
            $token = $user->createToken($request->userAgent(), ["$user->role"])->plainTextToken;
            $response = [
                'user' => $user,
                'token' => $token
            ];
            return response($response, 201);
        }
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Logged out'
        ];
    }

}
