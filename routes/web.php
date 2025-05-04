<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');


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

//dashboards

Route::get('/dashboard', [DashboardController::class, 'create'])->middleware('auth')->name('dashboard.index');
Route::get('/dashboard/create-board', [DashboardController::class, 'showCreateBoard'])->middleware('auth')->name('dashboard.create-board');
Route::post('/dashboard/create-board', [DashboardController::class, 'createBoard'])->middleware('auth');

//boards

Route::get('/board/{board_id}', [BoardController::class, 'show'])->middleware('auth');
