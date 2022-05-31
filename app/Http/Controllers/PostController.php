<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function add_post_page()
    {
        $categories = Category::query()->get();
        return view('admin.posts.add_post', compact('categories'));
    }

    public function add_post(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $imageName = uniqid('bhc') . '_' . $request->file('image')->getClientOriginalName();
            $image = $request->file('image');
            $image->storeAs('/public/images', $imageName);
            Post::query()->create([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imageName,
                'category_id' => $request->category_id,
            ]);
        } else {
            Post::query()->create([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
            ]);
        };
        $categories = Category::query()->get();
        return redirect()->route('admin.add_post_page', compact('categories'))->with('successd', 'Successfully added new post...');
    }
}
