<?php

namespace App\Http\Controllers\Backend;

use App\Helper\JwtToken;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

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
            $data = User::where('email', '=', $email)->first();

            if ($data != null) {
                $otp = rand(111111, 975632);
                // Update database otp 
                User::where('email', '=', $email)->update([
                    'Otp' => $otp
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successfull',
                    'otp' => $otp
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

}

/*
{
    "name": "Shovon",
    "email": "mman35230@gmail.com",
    "password": "sho"
}
*/