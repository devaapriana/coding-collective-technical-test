<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return view('welcome');
})->middleware('auth:sanctum');

Route::get('/', [UserController::class, 'index']);
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::patch('/users/{user}', [UserController::class, 'update'])->name('user.update');

Route::middleware('auth:sanctum')->prefix('attendances')->group(function () {
    Route::get('/', [AttendanceController::class, 'index'])->name('attendance');
    Route::put('/{attendance}', [AttendanceController::class, 'update'])->name('attendance.update');
    Route::post('active', [AttendanceController::class, 'active'])->name('attendance.active');
    Route::post('inactive', [AttendanceController::class, 'inactive'])->name('attendance.inactive');
    Route::get('/reports', [AttendanceController::class, 'reports'])->name('attendance.report');
});
