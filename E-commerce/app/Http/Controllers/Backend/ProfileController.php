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
        $email = $request->headers->get('userEmail');

        $data = User::where('email', '=', $email)->first();
        if ($data != null) {
            return response()->json([
                'status' => 'success',
                'data' => $data,
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
            $email = $request->headers->get('userEmail');

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
            $email = $request->headers->get('userEmail');

            $data = User::where('email', '=', $email)->count();
            if ($data != null) {
                $request->validate([
                    'img' => 'required|mimes:jpeg,jpg,png,gif|max:5000'
                ]);

                if ($request->hasFile('img')) {
                    $img = $request->file('img');
                    $imgOriginalName = $img->getClientOriginalName();
                    $imgOriginalExt = $img->getClientOriginalExtension();
                    $imgName = time() . "_" . md5(uniqid()) . "_" . $imgOriginalName . "_" . md5(time()) . "." . $imgOriginalExt;

                    // Update database img
                    User::where('email', '=', $email)->update([
                        'Img' => $imgName
                    ]);

                    // Store img in folder
                    $img->move(public_path('Uploaded_file/images/users'), $imgName);

                    return redirect('/admin/profile');
                    // return response()->json([
                    //     'status' => 'success',
                    //     'message' => 'Updated',
                    // ]);
                }
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
