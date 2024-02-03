<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    function BrandList(Request $request)
    {
        $userId = $request->headers->get('userId');
        $data = Brand::where('UserId', '=', $userId)->get();
        return $data;
    }

    function BrandById(Request $request)
    {
        $userId = $request->headers->get('userId');
        $brandId = $request->input('brandId');
        $data = Brand::where('UserId', '=', $userId)->where('id', '=', $brandId)->first();
        return $data;
    }

    function BrandCreate(Request $request)
    {
        try {
            $request->validate([
                'brandName' => 'required|string',
            ]);

            $userId = $request->headers->get('userId');

            Brand::create([
                'BrandName' => $request->input('brandName'),
                'UserId' => $userId,
            ]);

            return response()->json([
                'status' => 1,
                'message' => 'New brand created',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }

    function BrandDelete(Request $request)
    {
        try {
            $userId = $request->headers->get('userId');
            // $categoryId = $request->input('categoryId');
            $brandId = $request->input('brandID');

            // Brand::where('id', '=', $brandId)->where('UserId', '=', $userId)->where('CategoryId', '=', $categoryId)->delete();

            Brand::where('id', '=', $brandId)->where('UserId', '=', $userId)->delete();

            return response()->json([
                'status' => 1,
                'message' => 'Brand deleted',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }

    function BrandEdite(Request $request)
    {
        try {
            $userId = $request->headers->get('userId');
            $brandId = $request->input('brandID');

            Brand::where('id', '=', $brandId)->where('UserId', '=', $userId)->update([
                'BrandName' => $request->input('brandName'),
            ]);

            return response()->json([
                'status' => 1,
                'message' => 'Brand updated',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }
}
