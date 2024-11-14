<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/test', function () {
    return view('welcome');
})->middleware('auth:sanctum');
Route::get('/', [UserController::class, 'index']);
Route::patch('/users/{user}', [UserController::class, 'update'])->name('user.update');
