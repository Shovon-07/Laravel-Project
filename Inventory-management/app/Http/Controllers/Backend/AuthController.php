<?php

namespace App\Http\Controllers\Backend;

use App\Helper\JWTHelper;
use App\Http\Controllers\Controller;
use App\Mail\OTPMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function SignUp(Request $request)
    {
        try {
            User::create($request->all());
            return response()->json([
                "status" => "success",
                "message" => "Registration succesfull"
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function Login(Request $request)
    {
        try {
            $data = User::where('email', $request->input('email'))->where('password', $request->input('password'))->count();
            if ($data != null) {
                $token = JWTHelper::createToken($request->input('email'));
                return response()->json([
                    "status" => "success",
                    "message" => "Login succesfull",
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
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function SendOTP(Request $request)
    {
        try {
            $email = $request->input('email');
            $otp = rand(111111, 999999);

            // Get name & email address
            $data = User::where('email', $email)->select('firstName', 'lastName')->get();

            // Get full name
            foreach ($data as $name) {
                $firstName = $name['firstName'];
                $lastName = $name['lastName'];
                $fullName = $firstName . ' ' . $lastName;
            }

            if ($data != null) {
                // Send otp mail
                // Mail::to($email)->send(new OTPMail($fullName, $otp));

                // Update database otp
                User::where('email', $email)->update(['otp' => $otp]);

                return response()->json([
                    "status" => "success",
                    "message" => "6 digit otp sent in your email",
                ])->cookie('email', $email);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Please enter a valid email address',
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function VerifyOTP(Request $request)
    {
        $email = $request->cookie('email');
        $otp = $request->input('otp');
        $data = User::where('email', '=', $email)->where('otp', '=', $otp)->count();

        if ($data != null) {
            // Update database otp
            User::where('email', '=', $email)->where('otp', '=', $otp)->update(['otp' => '0']);
            $token = JWTHelper::createToken($email);

            // Clear cookie
            // Cookie::queue(Cookie::forget('email'));

            return response()->json([
                "status" => "success",
                "message" => "Otp verification successfull",
            ])->cookie('token', $token);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Otp is not valid',
            ]);
        }
    }

    public function UpdatePass(Request $request)
    {
        try {
            $password = $request->input('password');
            $email = $request->cookie('email');
            $data = User::where('email', '=', $email)->count();

            if ($data != null) {
                User::where('email', '=', $email)->update(['password' => $password]);
                return response()->json([
                    'status' => 'success',
                    'message' => 'Password updated'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong'
            ]);
        }

    }

    public function LogOut(Request $request)
    {
        Cookie::queue(Cookie::forget('token'));
        return redirect('/admin/');
    }

    public function Dashboard(Request $request)
    {
        $email = $request->cookie('email');
        $data = User::where('email', '=', $email)->select('firstName', 'lastName', 'email', 'mobile', );
        if ($data != null) {
            return view('Backend.Pages.Dashboard', ['data' => $data]);
        }
    }
}


// {
//     "firstName": "Al jubair",
//     "lastName": "Shovon",
//     "email": "mman35230@gmail.com",
//     "mobile": "01767692422",
//     "address": "Horogram, Kashiadanga, Court-6201, Rajshahi",
//     "password": "sho123"
// }