<?php

use App\Http\Controllers\LoginController;
use App\Http\Middleware\CheckLogin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('dashboard');
})->middleware(CheckLogin::class);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);
