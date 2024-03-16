<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\CheckLogin;
use App\Http\Middleware\Guest;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaReadController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\UserController;

Route::get('/', [DashboardController::class, 'index'])->middleware(CheckLogin::class);

Route::get('/login', [LoginController::class, 'index'])->middleware(Guest::class);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);


Route::get('/absensi', [AbsenController::class, 'index'])->middleware(CheckLogin::class);

Route::get('/siswa', [SiswaReadController::class, 'index'])->middleware(CheckLogin::class);

Route::get('/daftar-siswa', [SiswaController::class, 'index'])->middleware(CheckLogin::class);

Route::get('/daftar-guru', [GuruController::class, 'index'])->middleware(CheckLogin::class);

Route::get('/daftar-kelas', [KelasController::class, 'index'])->middleware(CheckLogin::class);

Route::get('/daftar-mapel', [MapelController::class, 'index'])->middleware(CheckLogin::class);

Route::get('/daftar-user', [UserController::class, 'index'])->middleware(CheckLogin::class);
