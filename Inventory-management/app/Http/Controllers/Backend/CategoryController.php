<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function CategoryList(Request $request)
    {
        $userId = $request->headers->get("id");
        $categories = Category::where('user_id', '=', $userId)->get();
        return response()->json([
            'categories' => $categories
        ]);
    }

    public function CreateCategory(Request $request)
    {
        $userId = $request->headers->get("id");
        Category::create([
            'category_name' => $request->input('categoryName'),
            'user_id' => $userId
        ]);
        return response()->json([
            'data' => $userId
        ]);
    }

    public function DeleteCategory(Request $request)
    {
        try {
            $category_name = $request->input('categoryName');
            $userId = $request->headers->get('id');
            Category::where('category_name', '=', $category_name)->where('user_id', '=', $userId)->delete();
            return response()->json([
                'status' => "Category deleted"
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => "Failed",
                'message' => $e->getMessage()
            ]);
        }
    }

}
