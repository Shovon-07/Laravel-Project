<?php

namespace App\Http\Controllers\Backend;

use App\Helper\JwtToken;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Hash;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function ProfileData(Request $request)
    {
        $token = $request->cookie('token');
        $result = JwtToken::VerifyToken($token);
        $email = $result->userEmail;

        $data = User::where('email', '=', $email)->first();
        if ($data != null) {
            return response()->json([
                'status' => 'success',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'No data found !',
            ]);
        }
    }

    function UpdateProfile(Request $request)
    {
        try {
            $token = $request->cookie('token');
            $result = JwtToken::VerifyToken($token);
            $email = $result->userEmail;

            $data = User::where('email', '=', $email)->count();
            if ($data != null) {
                User::where('email', '=', $email)->update([
                    'Name' => $request->input('name'),
                    'Password' => Hash::make($request->input('password'))
                ]);
                return response()->json([
                    'status' => 'success',
                    'message' => 'Updated',
                ]);
            } else {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Something went wrong !'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }

    function UpdateProfilePic(Request $request)
    {
        try {
            $token = $request->cookie('token');
            $result = JwtToken::VerifyToken($token);
            $email = $result->userEmail;

            $data = User::where('email', '=', $email)->count();
            if ($data != null) {
                $img = $request->file('img');
                $imgOriginalName = $img->getClientOriginalName();
                $imgOriginalExt = $img->getClientOriginalExtension();
                $imgName = time() . "_" . md5(uniqid()) . "_" . $imgOriginalName . "_" . md5(time()) . "." . $imgOriginalExt;

                User::where('email', '=', $email)->update([
                    'Img' => $imgName
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Updated',
                ]);
            } else {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Something went wrong !'
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
