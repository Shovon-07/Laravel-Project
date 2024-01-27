<?php

namespace App\Http\Controllers\Backend;

use App\Helper\JwtToken;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function ProfileData(Request $request)
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
}
