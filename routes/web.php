<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::get('/dashboard', [DashboardController::class, 'create'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'destroy'])->middleware('auth');

Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/profile', [ProfileController::class, 'create'])->middleware('auth');
Route::put('/profile/update', [ProfileController::class, 'update'])->middleware('auth');

Route::get('/forgot-password', [ForgotPasswordController::class, 'create'])->middleware('guest')->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'store'])->middleware('guest')->name('password.email');

Route::get('/reset-password', [ResetPasswordController::class, 'create'])->middleware('auth')->name('password.reset');

Route::post('/reset-password', [ResetPasswordController::class, 'update'])->middleware('auth')->name('password.update');
