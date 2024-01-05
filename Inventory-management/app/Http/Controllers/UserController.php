<?php

namespace App\Http\Controllers;

use App\Helper\JWTHelper;
use App\Mail\OTPMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function Registration(Request $request)
    {
        try {
            User::create([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'password' => $request->input('password'),
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'User registration succesfull'
            ]);

        } catch (Exception $exception) {
            return response()->json([
                'status' => 'failed',
                'message' => 'User registration failed'
            ]);
        }
    }

    public function Login(Request $request)
    {
        $data = User::where('email', '=', $request->input('email'))
            ->where('password', '=', $request->input('password'))
            ->count();

        if ($data > 0) {
            $token = JWTHelper::createToken($request->input('email'));
            return response()->json([
                'status' => 'success',
                'message' => 'Login successfull',
            ])->cookie('token', $token, time() + 60 * 60 * 0 * 0);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'User not found'
            ]);
        }
    }

    public function SendOtpCode(Request $request)
    {
        $email = $request->input('email');
        $otp = rand(1111, 9999);
        $count = User::where('email', '=', $request->email)->count();

        if ($count > 0) {
            // Send otp mail
            Mail::to($email)->send(new OTPMail($otp));

            // Update otp table in database
            User::where('email', '=', $email)->Update(['otp' => $otp]);

            return response()->json([
                'status' => 'success',
                'message' => '4 digit otp mail sent to your email !'
            ]);

        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Email not valid'
            ]);
        }
    }

    public function VerifyOtp(Request $request)
    {
        $email = $request->input('email');
        $otp = $request->input('otp');
        $count = User::where('email', '=', $request->email)->where('otp', '=', $otp)->count();

        if ($count > 0) {
            // Databse otp table update
            User::where('email', '=', $email)->update(['otp' => '0']);

            // Create token for reset password
            $token = JWTHelper::CreateTokenForPassReset($email);
            return response()->json([
                'status' => 'success',
                'message' => 'Otp verification successfull.',
            ])->cookie('token', $token, time() + 60 * 60 * 0 * 0);

        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Incorrect otp !'
            ]);
        }
    }

    public function ResetPassword(Request $request)
    {
        try {
            $email = $request->header('email');
            $password = $request->input('password');
            $count = User::where('email', '=', $email)->update(['password' => $password]);
            if ($count) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Password reset successfull'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Somethings went wrond !'
            ]);
        }
    }
}
