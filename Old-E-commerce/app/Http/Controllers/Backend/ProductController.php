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
    function ProductCreate(Request $request)
    {
        try {
            $request->validate([
                'productName' => 'required|string',
                'productTitle' => 'required|string',
                'productDescription' => 'required|string',
                'productPrice' => 'required|string',
                'productStock' => 'required|string',
                'productImg' => 'required',
                'categoryId' => 'required|string',
                'brandId' => 'required|string'
            ]);

            $img = $request->file('productImg');
            $imgName = md5(uniqid()) . '-' . time() . '-' . $img->getClientOriginalName() . '.' . $img->getClientOriginalExtension();
            $imgUrl = 'Uploaded_file/images/products/' + $imgName;
            $img->move(public_path('Uploaded_file/images/products'), $imgName);
            // $imgOriginalName = $img->getClientOriginalName();
            // $imgOriginalExt = $img->getClientOriginalExtension();

            Product::create([
                'ProductName' => $request->input('productName'),
                'ProductTitle' => $request->input('productTitle'),
                'ProductDescription' => $request->input('productDescription'),
                'ProductPrice' => $request->input('productPrice'),
                'ProductStock' => $request->input('productStock'),
                'ProductImg' => $imgUrl,

                'UserId' => $request->headers->get('userId'),
                'CategoryId' => $request->input('categoryId'),
                'BrandId' => $request->input('brandId'),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Product created',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }

    function ProductList(Request $request)
    {
        try {
            $userId = $request->headers->get('userId');
            $categoryId = $request->input('categoryId');
            $brandId = $request->input('brandId');
            // $data = Category::where('UserId', '=', $userId)->paginate(1)->withQueryString();
            $data = Product::where('UserId', '=', $userId)->where('CategoryId', '=', $categoryId)->where('BrandId', '=', $brandId)->get();

            return response()->json([
                'status' => 'success',
                'products' => $data
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
            $categoryId = $request->input('categoryId');
            $brandId = $request->input('brandId');

            // Delete image
            $imgPath = $request->input('imgPath');
            File::delete($imgPath);

            // Product::where('id', '=', $categoryId)->where('UserId', '=', $userId)->delete();

            Product::where('id', '=', $productId)->where('UserId', '=', $userId)->where('CategoryId', '=', $categoryId)->where('BrandId', '=', $brandId)->delete();

            return response()->json([
                'status' => "success",
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
            $request->validate([
                'productName' => 'required|string',
                'productTitle' => 'required|string',
                'productDescription' => 'required|string',
                'productPrice' => 'required|string',
                'productStock' => 'required|string',
                'categoryId' => 'required|string',
                'brandId' => 'required|string'
            ]);

            $userId = $request->headers->get('userId');
            $productId = $request->input('productId');
            $categoryId = $request->input('categoryId');
            $brandId = $request->input('brandId');

            if ($request->hasFile('img')) {
                $img = $request->file('productImg');
                $imgName = md5(uniqid()) . '-' . time() . '-' . $img->getClientOriginalName() . '.' . $img->getClientOriginalExtension();
                $imgUrl = 'Uploaded_file/images/products/' + $imgName;
                $img->move(public_path('Uploaded_file/images/products'), $imgName);

                // Delete old image
                $imgPath = $request->input('imgPath');
                File::delete($imgPath);

                Product::where('id', '=', $productId)->where('UserId', '=', $userId)->where('CategoryId', '=', $categoryId)->where('BrandId', '=', $brandId)->update([
                    'ProductName' => $request->input('productName'),
                    'ProductTitle' => $request->input('productTitle'),
                    'ProductDescription' => $request->input('productDescription'),
                    'ProductPrice' => $request->input('productPrice'),
                    'ProductStock' => $request->input('productStock'),
                    'ProductImg' => $imgUrl,

                    'UserId' => $userId,
                    'CategoryId' => $categoryId,
                    'BrandId' => $brandId,
                ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Product updated',
                ]);
            } else {
                Product::where('id', '=', $productId)->where('UserId', '=', $userId)->where('CategoryId', '=', $categoryId)->where('BrandId', '=', $brandId)->update([
                    'ProductName' => $request->input('productName'),
                    'ProductTitle' => $request->input('productTitle'),
                    'ProductDescription' => $request->input('productDescription'),
                    'ProductPrice' => $request->input('productPrice'),
                    'ProductStock' => $request->input('productStock'),

                    'UserId' => $userId,
                    'CategoryId' => $categoryId,
                    'BrandId' => $brandId,
                ]);

                return response()->json([
                    'status' => 'success',
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
    function BrandsListForProduct(Request $request)
    {
        try {
            $userId = $request->headers->get('userId');
            $categoryId = $request->input('categoryId');
            // $data = Brand::where('UserId', '=', $userId)->get();
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
}