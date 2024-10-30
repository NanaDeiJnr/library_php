<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // register user
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=> 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator-> fails()) {
            return response()->json(['errors'=> $validator->errors()], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User registered successfully!',
            'user' => $user,
        ], 200);
    }

    // Login function
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=> 'required|string|min:8'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()-> json([
                'message'=> 'Invalid credentials'
            ], 401);
        }

        // $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            // 'token' => $token,
            'user' => $user
        ], 200);
    }

    // logout function
    public function logout(Request $request)
    {
        $request->user()-tokens()->delete();

        return response()->json([
            'message'=>'Logged out succesfully'
        ], 200);
    }
}
