<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function Signup(Request $request)
    {
        try {
            $request->validate([
                "name" => "required|string",
                "email" => "required|string|email",
                "password" => "required|string|min:3"
            ]);

            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Registration successfull'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function Login(Request $request)
    {
        try {
            $email = $request->input('email');
            $password = $request->input('password');
            $user = User::where('email', $email)->first();

            if (!$user || !Hash::check($password, $user->password)) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'User not found !'
                ]);
            } else {
                $token = $user->createToken('token')->plainTextToken;
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successfull',
                    'token' => $token
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function SendOTP(Request $request)
    {
        try {
            $email = $request->input('email');
            $user = User::where('email', $email)->count();
            $otp = rand(111111, 999999);

            if ($user != null) {
                // Database(otp field) update
                User::where('email', $email)->update(['otp' => $otp]);

                $request->header('email', $email);
                return response()->json([
                    'status' => 'success',
                    'message' => '6 digit OTP sent in your email',
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Invalid email address !'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function VerifyOTP(Request $request)
    {
        try {
            $otp = $request->input('otp');
            $email = $request->header('email');

            $request->validate([
                'otp' => "required|string|min:6|max:6"
            ]);

            $data = User::where('email', $email)->where('otp', $otp)->count();

            if ($data != null) {
                User::where('email', $email)->where('otp', $otp)->update(['otp' => '0']);
                return response()->json([
                    'status' => 'success',
                    'message' => 'OTP verification successfull',
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Invalid OTP !'
                ]);
            }

        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }
}

/*
{
    "name": "Shovon",
    "email": "mman35230@gmail.com",
    "password": "sho"
}
*/