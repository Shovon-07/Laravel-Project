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

            if ($user && Hash::check($password, $user->password)) {
                $token = $user->createToken('token')->plainTextToken;
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successfull',
                    'token' => $token
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'User not found !',
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
                $name = User::where('email', '=', $email)->select('name')->first();
                $appName = env('APP_NAME');

                // Update database otp
                User::where('email', '=', $email)->update([
                    'otp' => $otp
                ]);

                // Send otp in email
                Mail::to($email)->send(new OtpMail($name->name, $otp, $appName));

                return response()->json([
                    'status' => 'success',
                    'message' => '6 digit otp sent in your email address',
                    'otp' => $otp,
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