<?php

namespace App\Http\Controllers;

class TrendPostController extends Controller
{
    public function index()
    {
        return view('admin.trend_posts.index');
    }
}
