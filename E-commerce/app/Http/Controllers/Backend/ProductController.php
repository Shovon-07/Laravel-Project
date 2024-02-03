<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Exception;
use File;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function ProductList(Request $request)
    {
        $userId = $request->headers->get('userId');
        // $categoryId = $request->input('categoryId');
        // $brandId = $request->input('brandId');
        // $data = Product::where('UserId', '=', $userId)->where('CategoryId', '=', $categoryId)->where('BrandId', '=', $brandId)->get();
        $data = Product::where('UserId', '=', $userId)->get();
        return $data;
    }

    function ProductById(Request $request)
    {
        $userId = $request->headers->get('userId');
        $productId = $request->input('productId');
        $data = Product::where('UserId', '=', $userId)->where('id', '=', $productId)->first();
        return $data;
    }

    function ProductCreate(Request $request)
    {
        try {
            $request->validate([
                'categoryId' => 'required|string',
                'brandId' => 'required|string',
                'productName' => 'required|string',
                'productTitle' => 'required|string',
                'productPrice' => 'required|string',
                'productStock' => 'required|string',
                'productDescription' => 'required|string',
                'productImg' => 'required',
            ]);

            $img = $request->file('productImg');
            $imgName = md5(uniqid()) . '-' . time() . '-' . $img->getClientOriginalName();
            $imgUrl = 'images/products/' . $imgName;
            $img->move(public_path('Uploaded_file/images/products'), $imgName);

            Product::create([
                'ProductName' => $request->input('productName'),
                'ProductTitle' => $request->input('productTitle'),
                'ProductPrice' => $request->input('productPrice'),
                'ProductStock' => $request->input('productStock'),
                'ProductDescription' => $request->input('productDescription'),
                'ProductImg' => $imgUrl,

                'UserId' => $request->headers->get('userId'),
                'CategoryId' => $request->input('categoryId'),
                'BrandId' => $request->input('brandId'),
            ]);

            return response()->json([
                'status' => 1,
                'message' => 'Product created',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function ProductDelete(Request $request)
    {
        try {
            $userId = $request->headers->get('userId');
            $productId = $request->input('productId');
            // $categoryId = $request->input('categoryId');
            // $brandId = $request->input('brandId');

            Product::where('id', '=', $productId)->where('UserId', '=', $userId)->delete();

            // Delete image
            $imgPath = public_path('Uploaded_file/') . $request->input('imgPath');
            File::delete($imgPath);

            return response()->json([
                'status' => 1,
                'message' => 'Product deleted'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => "Failed",
                'message' => $e->getMessage()
            ]);
        }
    }

    function ProductEdite(Request $request)
    {
        try {
            $userId = $request->headers->get('userId');
            $productId = $request->input('productId');

            $request->validate([
                'productName' => 'required|string',
                'productTitle' => 'required|string',
                'productPrice' => 'required|string',
                'productStock' => 'required|string',
                'productDescription' => 'required|string',
            ]);

            if ($request->hasFile('img')) {
                $img = $request->file('productImg');
                $imgName = md5(uniqid()) . '-' . time() . '-' . $img->getClientOriginalName();
                $imgUrl = 'images/products/' . $imgName;
                $img->move(public_path('Uploaded_file/images/products'), $imgName);

                Product::where('id', '=', $productId)->where('UserId', '=', $userId)->update([
                    'ProductName' => $request->input('productName'),
                    'ProductTitle' => $request->input('productTitle'),
                    'ProductDescription' => $request->input('productDescription'),
                    'ProductPrice' => $request->input('productPrice'),
                    'ProductStock' => $request->input('productStock'),
                    'ProductImg' => $imgUrl,
                ]);

                // Delete prev image
                $imgPath = public_path('Uploaded_file/') . $request->input('imgPath');
                File::delete($imgPath);

                return response()->json([
                    'status' => 1,
                    'message' => 'Product updated sexy',
                ]);
            } else {
                Product::where('id', '=', $productId)->where('UserId', '=', $userId)->update([
                    'ProductName' => $request->input('productName'),
                    'ProductTitle' => $request->input('productTitle'),
                    'ProductDescription' => $request->input('productDescription'),
                    'ProductPrice' => $request->input('productPrice'),
                    'ProductStock' => $request->input('productStock'),
                ]);

                return response()->json([
                    'status' => 1,
                    'message' => 'Product updated',
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }


    //___ Additional ___//
    // function BrandsListForProduct(Request $request)
    // {
    //     try {
    //         $userId = $request->headers->get('userId');
    //         $categoryId = $request->input('categoryId');
    //         // $data = Brand::where('UserId', '=', $userId)->get();
    //         $data = Brand::where('UserId', '=', $userId)->where('CategoryId', '=', $categoryId)->get();

    //         return response()->json([
    //             'status' => 'success',
    //             'brands' => $data
    //         ]);
    //     } catch (Exception $e) {
    //         return response()->json([
    //             'status' => 'failed',
    //             'message' => $e->getMessage()
    //         ]);
    //     }
    // }
}
