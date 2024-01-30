<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Exception;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    function CreateBrands(Request $request)
    {
        try {
            $request->validate([
                'brandName' => 'required|string',
            ]);

            $userId = $request->headers->get('userId');
            $categoryId = $request->input('categoryId');

            Brand::create([
                'BrandName' => $request->input('brandName'),
                'UserId' => $userId,
                'CategoryId' => $categoryId
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'New brand created',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }

    function BrandsList(Request $request)
    {
        try {
            $userId = $request->headers->get('userId');
            $categoryId = $request->input('categoryId');
            // $data = Brand::where('UserId', '=', $userId)->where('CategoryId', '=', $categoryId)->get();

            $data = Brand::where('UserId', '=', $userId)->get();

            return response()->json([
                'status' => 'success',
                'brands' => $data
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }
}
