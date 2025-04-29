<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }
    public function store(LoginRequest $request)
    {
        $remember = false;
        if ($request->remember == 'on') {
            $remember = true;
        }
        if (Auth::attempt($request->validated(), $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
            //The intended method provided by Laravel's redirector will redirect the user to the URL they were attempting to access before being intercepted by the authentication middleware. A fallback URI may be given to this method in case the intended destination is not available.
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
