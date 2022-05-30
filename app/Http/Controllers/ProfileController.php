<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $user = User::query()->where('id', $id)->first();
        return view('admin.profile.index', compact('user'));
    }

    public function update_admin(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
        ]);
        $this->update_admin_data($request, $id);
        return to_route('dashboard')->with("updated", "Updated admin data successfully...");
    }

    public function change_password()
    {
        return view('admin.profile.change_password');
    }

    public function update_password(Request $request)
    {
        $request->validate([
            "oldPassword" => "required",
            "newPassword" => "required",
            "comfirmPassword" => "required|same:newPassword",
        ]);

        $user = User::query()->where('id', auth()->user()->id)->first();
        $passwordFromUser = $user->password;
        if (Hash::check($request->oldPassword, $passwordFromUser)) {
            if (strlen($request->newPassword) <= 7) {
                return back()->with("MustGraterThan8", "Password length must greater than 8.");
            } else {
                $this->update_admin_password($request);
                return back()->with("ChangePasswordOk", "Password updated successfully...");
            }
        } else {
            return back()->with("fail", "Old password does not correct.");
        }
    }

    private function update_admin_password($request)
    {
        $hashedNewPassword = Hash::make($request->newPassword);
        User::query()->where('id', auth()->user()->id)->update([
            "password" => $hashedNewPassword,
        ]);
    }

    private function update_admin_data($request, $id)
    {
        User::query()->where('id', $id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
            "gender" => $request->gender,
        ]);
    }
}
