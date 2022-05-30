<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
        // Direct Admin List Page
        $users = User::query()->paginate(3);
        return view('admin.lists.index', compact('users'));
    }

    public function search_admin(Request $request)
    {
        $table_search = $request->table_search;
        $users = User::query()->orWhere('id', 'like', "%" . $table_search . "%")
            ->orWhere('name', 'like', '%' . $table_search . '%')
            ->orWhere('email', 'like', '%' . $table_search . '%')
            ->orWhere('phone', 'like', '%' . $table_search . '%')
            ->orWhere('address', 'like', '%' . $table_search . '%')->paginate(3);
        $users->appends($request->all());
        return view('admin.lists.index', compact('users'));
    }

    public function delete_admin($id)
    {
        User::query()->where('id', $id)->delete();
        return back()->with("deleteds", "Deleted successfully...");
    }
}
