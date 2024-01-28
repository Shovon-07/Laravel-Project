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
                'category' => $data
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage()
            ]);
        }
    }
}