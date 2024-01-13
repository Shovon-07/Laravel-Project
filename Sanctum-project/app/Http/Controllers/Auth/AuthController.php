<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function SignUp(Request $request)
    {
        try {
            $request->validate([
                "name" => 'required|string|max:50',
                "email" => 'required|string|email|max:50|unique:users,email',
                "password" => 'required|string|min:3',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Account created'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function Login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string|min:3',
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->input('password'), $user->password)) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'User not found !'
                ]);
            } else {
                $token = $user->createToken('token')->plainTextToken;
                return response()->json([
                    'status' => 'success',
                    'message' => 'Login successfully',
                    'token' => $token
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


// {
//     "name": "Shovon",
//     "email": "mman35230@gmail.com",
//     "password": "sho123"
// }