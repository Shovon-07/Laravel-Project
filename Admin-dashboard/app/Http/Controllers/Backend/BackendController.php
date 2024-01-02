<?php

namespace App\Http\Controllers\Backend;

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
}
