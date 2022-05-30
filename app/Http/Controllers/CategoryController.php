<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->paginate(3);
        return view('admin.category.index', compact('categories'));
    }

    public function add_category_page()
    {
        return view('admin.category.add_category');
    }

    public function add_category(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $this->add_category_to_database($request);
        $categories = Category::query()->paginate(3);
        return view('admin.category.index', compact('categories'))->with("success", 'Successfully added category');
    }

    public function delete_category($id)
    {
        Category::query()->where('id', $id)->delete();
        return back()->with('deletedCategory', "Successfully deleted category");
    }

    public function search_category(Request $request)
    {
        $table_search = $request->table_search;
        $categories = Category::query()->orWhere('title', 'like', '%' . $table_search . '%')
            ->orWhere('description', 'like', '%' . $table_search . '%')->paginate(3);
        $categories->appends($request->all());
        return view('admin.category.index', compact('categories'));
    }

    public function edit_category_page($id)
    {
        $category = Category::query()->where('id', $id)->first();
        return view('admin.category.edit_category', compact('category'));
    }

    public function edit_category(Request $request, $id)
    {
        $this->update_category($request, $id);
        return back()->with('successUpdate', 'Successfully updated...');
    }

    private function update_category($request, $id)
    {
        Category::query()->where('id', $id)->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
    }

    private function add_category_to_database($request)
    {
        Category::query()->create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
    }
}
