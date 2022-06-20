<?php

namespace App\Http\Controllers;

use App\Models\ActionLog;
use Illuminate\Support\Facades\DB;

class TrendPostController extends Controller
{
    public function index()
    {
        $posts = ActionLog::query()->select('posts.*', 'action_logs.*', DB::raw('COUNT(action_logs.post_id) as count'))->join('posts', 'action_logs.post_id', 'posts.id')->groupBy('action_logs.post_id')->get();
        // dd($posts->toArray());
        return view('admin.trend_posts.index', compact('posts'));
    }
}
