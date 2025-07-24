<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Handle user authentication.
     */
    public function login(Request $request)
    {
        // validate the request and get ony email and password
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // get only email and password from the request
        $credentials = [
            'email' => $credentials['email'],
            'password' => $credentials['password'],
        ];

        // attempt to authenticate the user using only email and password
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials.',
            ], 401);
        }

        $user = Auth::user();

        // generate a new token for the user
        $token = auth('sanctum')->user()->createToken('auth_token')->plainTextToken;


        return response()->json([
            'success' => true,
            'data' => [
                'user' => $user,
                'token' => $token,
            ],
            'message' => 'User authenticated successfully.',
        ]);
    }
}
