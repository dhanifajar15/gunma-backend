<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Helpers\ResponseFormatter;
use Response;
use Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'isAdmin' => ['required'],
                'isVerified' => ['required'],
                'address' => ['required', 'string', 'max:255'],
                'phoneNumber' => ['required', 'int'],
                'description' => ['required', 'string', 'max:255'],
                'email_verified_at' => ['required', 'date'] 
            ]);

                User::create([
                'name' => $request -> name,
                'email' => $request -> email,
                'password' => Hash::make($request -> password),
                'isAdmin' => $request -> isAdmin,
                'isVerified' => $request -> isVerified,
                'address' => $request -> address,
                'phoneNumber' => $request -> phoneNumber,
                'description' => $request -> description,
                'email_verified_at' => $request -> email_verified_at
            ]);

            $user = User::where('email', $request->email)->first();

            $tokenResult = $user->createToken('authToken')->plainTextToken;

            return ResponseFormatter::success([
                'access_token' => 'tokenResult',
                'token_type' => 'Bearer',
                'user' => $user
            ], 'User Registered');

        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication failed');    
        }
    }

    public function login(Request $request) 
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            $credentials = request(['email', 'password']);

            if (!Auth::attempt($credentials)) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized'
                ], 'Authentication Failed');    
            }         
                
            $user = User::where('email', $request ->email)->first(); 
            
            if (!Hash::check($request->password, $user->password, [])) {
                throw new \Exception('Invalid Credentials');
            }

            $tokenResult = $user->createToken('authToken')->plainTextToken;
            
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Authenticated');

        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication failed');
        }
    }

    public function fetch(Request $request)
    {
        return ResponseFormatter::success($request->user(), 'Profile user berhasil diambil');
    }

    public function updateProfile(Request $request)
    {
        $data = $request ->all();

        $user = Auth::user();
        $user -> update ($data);

        return ResponseFormatter::success($user, 'Profile berhasil diupdate');
    }

    public function logout(Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();

        return ResponseFormatter::success($token, 'Token berhasil dicabut');
    }
}
