<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('profile.profile', ['user' => $user]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $userId = Auth::id();
        $users = User::all();
        $user = $users->findOrFail($userId);
        $newUser = $request->validated();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('/dashboard');
    }
}
