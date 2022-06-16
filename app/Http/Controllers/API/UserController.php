<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function user_list()
    {
        $user = User::query()->get();
        $data_response = [
            'message' => 'ok',
            'data' => $user,
        ];
        return response()->json($data_response);
    }
}
