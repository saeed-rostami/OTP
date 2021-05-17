<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileRequest;
use App\Models\User;
use App\Services\ImageUpload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('main.user.profile', compact('user'));
    }

    public function update(UserProfileRequest $request, User $user)
    {
        if ($request->hasFile('avatar')) {
            File::delete("storage/" . $user->avatar);
            $avatar = $request->file('avatar')->store('avatars', 'public');

            $path = "storage/" . $avatar;
            $width = 200;
            $height = 150;
            ImageUpload::upload($path, $width, $height);
        }
        $user->update([
            'name' => $request->name,
            'family' => $request->family,
            'email' => $request->email,
            'avatar' => $avatar,
        ]);
        $user->save();
        return redirect()->back();
    }

    public function deleteAvatar(User $user)
    {
        File::delete("storage/" . $user->avatar);
        $user->update([
            'avatar' => null
        ]);
        $user->save();
        return redirect()->back();
    }
}
