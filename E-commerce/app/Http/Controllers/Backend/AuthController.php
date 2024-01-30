<?php

namespace App\Http\Controllers\Backend;

use App\Helper\JwtToken;
use App\Http\Controllers\Controller;
use App\Mail\PasswordRecoverOtp;
use App\Models\User;
use Exception;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    function Signup(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users,email',
                'password' => 'required|string|min:3|max:10'
            ]);

            User::create([
                'Name' => $request->input('name'),
                'Email' => $request->input('email'),
                'Password' => Hash::make($request->input('password'))
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

    function Login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string|min:3|max:10',
            ]);

            $email = $request->input('email');
            $password = $request->input('password');
            $data = User::where('Email', '=', $email)->first();

            if ($data == true && Hash::check($password, $data->Password)) {
                // Create authentication token
                $token = JwtToken::CreateLoginToken($data->id, $data->Email);
                // $request->headers->set('token', $token);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successfull',
                    'token' => $token
                ])->cookie('token', $token);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'User not found !',
                ]);
            }

        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }

    function Logout()
    {
        Cookie::queue(Cookie::forget('token'));
        return redirect('/admin/');
    }

    function SendOtp(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email'
            ]);

            $email = $request->input('email');
            $data = User::where('Email', '=', $email)->first();

            if ($data != null) {
                $otp = rand(111111, 975632);
                $appName = env('APP_NAME');

                // Update database otp 
                User::where('Email', '=', $email)->update([
                    'Otp' => $otp
                ]);

                // Send otp mail
                Mail::to($email)->send(new PasswordRecoverOtp($data->Name, $otp, $appName));

                return response()->json([
                    'status' => 'success',
                    'message' => '6 digit otp sent in your email',
                    'email' => $data->Email
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Not a valid email !',
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }

    function VerifyOtp(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'otp' => 'required|string|min:6|max:6'
            ]);

            $email = $request->input('email');
            $otp = $request->input('otp');
            $data = User::where('Email', '=', $email)->where('Otp', '=', $otp)->first();

            if ($data != null) {
                // Update database otp
                User::where('Email', '=', $email)->where('Otp', '=', $otp)->update([
                    'Otp' => 0
                ]);

                // Create authentication token
                $token = JwtToken::CreateLoginToken($data->id, $data->Email);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Otp verified',
                    'token' => $token
                ])->cookie('token', $token);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Invalid otp !',
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }

    function UpdatePassword(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string|min:3|max:10'
            ]);

            $email = $request->input('email');
            $password = $request->input('password');
            $data = User::where('email', '=', $email)->count();

            if ($data != null) {
                User::where('email', '=', $email)->update([
                    'Password' => Hash::make($password)
                ]);

                Cookie::queue(Cookie::forget('token'));

                return response()->json([
                    'status' => 'success',
                    'message' => 'Password updated',
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
                'message' => $e->getMessage()
            ]);
        }
    }

}

/*
{
    [
        "name": "Shovon",
        "email": "mman35230@gmail.com",
        "password": "sho"
    ],
    [
        "name": "Asik",
        "email": "asik@gmail.com",
        "password": "asi"
    ],
    [
        "name": "Jony",
        "email": "jony@gmail.com",
        "password": "jon"
    ]    
}
*/