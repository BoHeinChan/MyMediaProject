<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->paginate(3);
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
        $this->add_post_to_db($request);
        $categories = Category::query()->get();
        return redirect()->route('admin.add_post_page', compact('categories'))->with('successd', 'Successfully added new post...');
    }

    public function edit_post_page($id)
    {
        $post = Post::query()->where('id', $id)->first();
        $categories = Category::query()->get();
        return view('admin.posts.edit_post', compact('categories', 'post'));
    }

    public function edit_post(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);
        $this->add_edited_post_to_db($request, $id);
        return back()->with('successu', 'Successfully updated post...');
    }

    public function search_post(Request $request)
    {
        $table_search = $request->table_search;
        $posts = Post::query()->orWhere('id', 'like', '%' . $table_search . '%')
            ->orWhere('title', 'like', '%' . $table_search . '%')
            ->orWhere('description', 'like', '%' . $table_search . '%')->paginate(3);
        $posts->appends($request->all());
        return view('admin.posts.index', compact('posts'));
    }

    public function delete_post($id)
    {
        Post::query()->where('id', $id)->delete();
        return back()->with('successdelete', 'Successfully deleted post...');
    }

    private function add_post_to_db($request)
    {
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
        }
        ;
    }

    private function add_edited_post_to_db($request, $id)
    {
        if ($request->hasFile('image')) {
            $imageName = uniqid('bhc') . '_' . $request->file('image')->getClientOriginalName();
            $image = $request->file('image');
            $image->storeAs('/public/images', $imageName);
            Post::query()->where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imageName,
                'category_id' => $request->category_id,
            ]);
        } else {
            Post::query()->where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
            ]);
        }
        ;
    }
}
