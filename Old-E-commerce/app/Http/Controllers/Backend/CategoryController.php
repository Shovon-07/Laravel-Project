<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function CreateCategory(Request $request)
    {
        try {
            $request->validate([
                'categoryName' => 'required|string',
            ]);

            $userId = $request->headers->get('userId');
            Category::create([
                'CategoryName' => $request->input('categoryName'),
                'UserId' => $userId
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Category created',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }

    function CategoryList(Request $request)
    {
        try {
            $userId = $request->headers->get('userId');
            // $data = Category::where('UserId', '=', $userId)->paginate(1)->withQueryString();
            $data = Category::where('UserId', '=', $userId)->get();

            return response()->json([
                'status' => 'success',
                'categories' => $data
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }

    public function CategoryDelete(Request $request)
    {
        try {
            $request->validate([
                'categoryId' => 'required|string'
            ]);

            $userId = $request->headers->get('userId');
            $categoryId = $request->input('categoryId');
            Category::where('id', '=', $categoryId)->where('UserId', '=', $userId)->delete();
            return response()->json([
                'status' => "success",
                'message' => 'Category deleted'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => "Failed",
                'message' => $e->getMessage()
            ]);
        }
    }

    function CategoryEdite(Request $request)
    {
        try {
            // $request->validate([
            //     'categoryId' => 'required|string',
            //     'categoryName' => 'required|string'
            // ]);

            $userId = $request->headers->get('userId');
            $categoryId = $request->input('categoryId');

            Category::where('id', '=', $categoryId)->where('UserId', '=', $userId)->update([
                'CategoryName' => $request->input('categoryName'),
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Category updated',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }

}