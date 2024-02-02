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
            $data = Brand::where('UserId', '=', $userId)->where('CategoryId', '=', $categoryId)->get();

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

    function BrandsDelete(Request $request)
    {
        try {
            $userId = $request->headers->get('userId');
            // $categoryId = $request->input('categoryId');
            $brandId = $request->input('brandID');

            // Brand::where('id', '=', $brandId)->where('UserId', '=', $userId)->where('CategoryId', '=', $categoryId)->delete();

            Brand::where('id', '=', $brandId)->where('UserId', '=', $userId)->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Brand deleted',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }

    function BrandsEdite(Request $request)
    {
        try {
            $userId = $request->headers->get('userId');
            $brandId = $request->input('brandID');

            Brand::where('id', '=', $brandId)->where('UserId', '=', $userId)->update([
                'BrandName' => $request->input('brandName'),
            ]);

            return response()->json([
                'status' => 'success',
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
