<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;

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
}
