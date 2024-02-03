<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Hash;
use File;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    function ProfileData(Request $request)
    {
        $email = $request->headers->get('userEmail');

        $data = User::where('email', '=', $email)->first();
        if ($data != null) {
            return response()->json([
                'status' => 1,
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
                    // 'Password' => Hash::make($request->input('password')),
                    'Mobile' => $request->input('mobile'),
                ]);
                return response()->json([
                    'status' => 1,
                    'message' => 'Updated',
                ]);
            } else {
                return response()->json([
                    'status' => 0,
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
                if ($request->hasFile('userImg')) {
                    $request->validate([
                        'userImg' => 'required|mimes:jpeg,jpg,png,gif|max:5000'
                    ]);

                    $img = $request->file('userImg');
                    $imgName = md5(uniqid()) . '-' . time() . '-' . $img->getClientOriginalName();
                    $imgUrl = 'images/user/' . $imgName;

                    // Save image in folder
                    $img->move(public_path('Uploaded_file/images/user'), $imgName);

                    // Delete previes image
                    $prevUserImg = public_path('Uploaded_file/') . $request->input('prevUserImg');
                    File::delete($prevUserImg);


                    User::where('email', '=', $email)->update([
                        'Img' => $imgUrl
                    ]);
                    return response()->json([
                        'status' => 1,
                        'message' => 'Updated',
                    ]);
                }
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }
}