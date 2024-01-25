<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function CategoryList(Request $request)
    {
        $id = $request->headers->get("id");
        $categories = Category::where('user_id', '=', $id)->get();
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
            'status' => 'success',
            'message' => 'New category created',
            'data' => $userId
        ]);
    }

    public function DeleteCategory(Request $request)
    {
        try {
            // $category_name = $request->input('categoryName');
            $categoryId = $request->input('categoryId');
            $userId = $request->headers->get('id');
            Category::where('id', '=', $categoryId)->where('user_id', '=', $userId)->delete();
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

}
