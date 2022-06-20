<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        $hashedPassword = Hash::make($request->password);
        User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword,
        ]);
        $user = User::query()->where('email', $request->email)->first();
        $token = $user->createToken('token')->plainTextToken;
        return response()->json([
            'message' => 'Register success!',
            'token' => $token,
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::query()->where('email', $request->email)->first();
        if (empty($user) || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Login Success',
                'data' => null,
                'token' => null,
            ]);
        } else {
            $token = $user->createToken('token')->plainTextToken;
            return response()->json([
                'message' => 'Login Success',
                'data' => $user,
                'token' => $token,
            ]);
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Log out success...',
        ]);
    }
}
