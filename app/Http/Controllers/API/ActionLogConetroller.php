<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ActionLog;
use Illuminate\Http\Request;

class ActionLogConetroller extends Controller
{
    public function action_log(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'post_id' => $request->post_id,
        ];
        ActionLog::query()->create($data);
        $actions = ActionLog::query()->where('post_id', $request->post_id)->get();
        return response()->json([
            'data' => $actions,
        ]);
    }
}
