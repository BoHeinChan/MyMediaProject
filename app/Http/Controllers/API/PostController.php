<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post_list()
    {
        $posts = Post::query()->get();
        $data_repsonse = [
            'status' => 'ok',
            'data' => $posts,
        ];
        return response()->json($data_repsonse);
    }

    public function post_details(Request $request)
    {
        $post = Post::query()->where('id', $request->key)->first();
        return response()->json([
            'post' => $post,
        ]);
    }
}
