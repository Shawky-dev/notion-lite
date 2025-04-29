<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/dashboard', function () {
    $user = Auth::user();
    return view('dashboard.index', ['name' => $user->name]);
})->middleware('auth');
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'destroy'])->middleware('auth');

Route::get('/login', [LoginController::class, 'create']);
Route::post('/login', [LoginController::class, 'store']);

Route::get('/profile', [ProfileController::class, 'create'])->middleware('auth');
Route::put('/profile/update', [ProfileController::class, 'update'])->middleware('auth');
Route::put('/profile/resetpassword', [ProfileController::class, 'resetPassword'])->middleware('auth');
