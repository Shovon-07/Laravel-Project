<?php

namespace App\Http\Controllers\Backend;

use App\Helper\JWTHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function Register(Request $request)
    {
        try {
            User::create($request->input());
            return response()->json(['status' => 'Success', 'message' => 'User create successfully']);
        } catch (Exception $exception) {
            return response()->json(['status' => 'Failed', 'message' => $exception->getMessage()]);
        }
    }

    public function Login(Request $request)
    {
        try {
            $data = User::where($request->input())->select('id')->first();
            $userId = $data->id;

            if ($userId > 0) {
                $token = JWTHelper::generateToken($request->input('email'), $userId);
                return response()->json(['status' => "Success", 'message' => 'Login succesfully'])->cookie('token', $token, time() + 60 * 60);
            } else {
                return response()->json(['status' => 'Opps !', 'message' => 'User not found']);
            }

        } catch (Exception $exception) {
            return response()->json(['status' => "Failed", 'message' => $exception->getMessage()]);
        }
    }
}
