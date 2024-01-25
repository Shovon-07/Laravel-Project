<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\OtpMail;
use App\Models\User;
use Auth;
use Exception;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    function Signup(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:30',
                'email' => 'required|string|email|unique:users,email',
                'password' => 'required|string|min:3'
            ]);

            User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Registration successfull',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(),
            ]);
        }
    }

    function Login(Request $request)
    {
        try {
            $email = $request->input('email');
            $password = $request->input('password');
            $user = User::where('email', '=', $email)->first();

            if (!$user || !Hash::check($password, $user->password)) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'User not found !',
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
                'message' => $e->getMessage(),
            ]);
        }
    }

    function Logout(Request $request)
    {
        Auth::user()->tokens()->delete();
        return redirect('/admin/');
    }

    function SendOtp(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email'
            ]);

            $email = $request->input('email');
            $data = User::where('email', '=', $email)->count();

            if ($data != null) {
                $otp = rand(111111, 975632);
                $data = User::where('email', '=', $email)->first();
                $appName = env('APP_NAME');

                // Send otp in email
                // Mail::to($email)->send(new OtpMail($data->name, $otp, $appName));

                // Update database otp
                User::where('email', '=', $email)->update([
                    'otp' => $otp
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => '6 digit otp sent in your email address',
                    'otp' => $otp,
                    'email' => $email
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Email not exist !',
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(),
            ]);
        }
    }

    function VerifyOtp(Request $request)
    {
        try {
            $request->validate([
                'otp' => 'required|string|min:6|max:6',
            ]);

            $email = $request->input('email');
            $otp = $request->input('otp');
            $data = User::where('email', '=', $email)->count();

            if ($data != null) {
                $verifyOTP = User::where('email', '=', $email)->where('otp', '=', $otp)->count();

                if ($verifyOTP != null) {
                    User::where('email', '=', $email)->update([
                        'otp' => 0
                    ]);
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Otp verificition successfull',
                        'email' => $email,
                    ]);
                } else {
                    return response()->json([
                        'status' => 'failed',
                        'message' => 'Otp not valid !',
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Something went wrong !',
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(),
            ]);
        }
    }

    function UpdatePassword(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string|min:3'
            ]);

            $email = $request->input('email');
            $password = $request->input('password');
            $data = User::where('email', '=', $email)->count();

            if ($data != null) {
                User::where('email', '=', $email)->update([
                    'password' => Hash::make($password)
                ]);
                return response()->json([
                    'status' => 'success',
                    'message' => 'Password updated',
                    'data' => $data
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Something went wrong !',
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(),
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