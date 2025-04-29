<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('profile.index', ['user' => $user]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $userId = Auth::id();

        $users = User::all();
        $user = $users->findOrFail($userId);
        $newUser = $request->validated();
        dd($newUser);
    }
    public function resetPassword(Request $request) {}
}
