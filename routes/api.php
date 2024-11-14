<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])->name('login.action');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
