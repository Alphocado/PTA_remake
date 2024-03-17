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


Route::middleware(['check-role1'])->group(function () {
  Route::get('/', [DashboardController::class, 'index']);
  Route::get('/absensi', [AbsenController::class, 'index']);
  Route::get('/siswa', [SiswaReadController::class, 'index']);
});

Route::middleware(['check-role2'])->group(function () {
  Route::resource('/daftar-siswa', SiswaController::class);
  Route::resource('/daftar-guru', GuruController::class);
  Route::resource('/daftar-kelas', KelasController::class);
  Route::resource('/daftar-mapel', MapelController::class);
});

Route::middleware(['check-role3'])->group(function () {
  Route::resource('/daftar-user', UserController::class);
});
