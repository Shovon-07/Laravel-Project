<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    function GetProfileData(Request $request)
    {
        try {
            $user = Auth::user();
            return response()->json([
                'status' => 'success',
                'user' => $user
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(),
            ]);
        }
    }

    function ProfileUpdate(Request $request)
    {
        try {
            $request->validate([
                "name" => "required|string",
                "password" => "required|string|min:3"
            ]);

            $id = Auth::user()->id;
            User::where('id', $id)->update([
                'name' => $request->input('name'),
                'password' => Hash::make($request->input('password')),
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Profile updated',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(),
            ]);
        }
    }
}