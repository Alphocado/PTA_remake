<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\CheckRole1;
use App\Http\Middleware\CheckRole2;
use App\Http\Middleware\CheckRole3;
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


Route::get('/login', [LoginController::class, 'index'])->middleware(Guest::class);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);


Route::get('/', [DashboardController::class, 'index'])->middleware(CheckRole1::class);
Route::get('/absensi', [AbsenController::class, 'index'])->middleware(CheckRole1::class);
Route::get('/siswa', [SiswaReadController::class, 'index'])->middleware(CheckRole1::class);

Route::get('/daftar-siswa', [SiswaController::class, 'index'])->middleware(CheckRole2::class);
Route::get('/daftar-guru', [GuruController::class, 'index'])->middleware(CheckRole2::class);
Route::get('/daftar-kelas', [KelasController::class, 'index'])->middleware(CheckRole2::class);
Route::get('/daftar-mapel', [MapelController::class, 'index'])->middleware(CheckRole2::class);

Route::get('/daftar-user', [UserController::class, 'index'])->middleware(CheckRole3::class);
