<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category_list()
    {
        $categories = Category::query()->get();
        $data_response = [
            'status' => 'ok',
            'data' => $categories,
        ];
        return response()->json($data_response);
    }

    public function search_category(Request $request)
    {
        $data = Post::query()->where('category_id', $request->key)->get();
        return response()->json([
            'post' => $data,
        ]);
    }
}
