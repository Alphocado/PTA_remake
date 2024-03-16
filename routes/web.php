<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\Guest;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbsenController;

Route::get('/', [DashboardController::class, 'index'])->middleware(CheckLogin::class);

Route::get('/login', [LoginController::class, 'index'])->middleware(Guest::class);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);


Route::get('/absensi', [AbsenController::class, 'index'])->middleware(CheckLogin::class);
