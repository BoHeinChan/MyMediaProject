<?php

namespace App\Http\Controllers;

class TrendPostController extends Controller
{
    public function trend_post()
    {
        return view('admin.trend_posts.index');
    }
}
