<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return view('welcome');
})->middleware('auth:sanctum');

Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [UserController::class, 'index']);
Route::patch('/users/{user}', [UserController::class, 'update'])->name('user.update');

Route::get('attendance', [AttendanceController::class, 'index'])->name('attendance')->middleware('auth:sanctum');
