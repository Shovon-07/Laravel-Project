<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // function Dashboard(Request $request)
    // {
    //     $user = Auth::user();
    //     if ($user != null) {
    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'Welcome ' . $user->name,
    //             // 'token' => Auth::user()->tokens()
    //         ]);
    //     } else {
    //         return response()->json([
    //             'status' => 'failed',
    //             'message' => 'Something went wrong !',
    //         ]);
    //     }
    // }
}
