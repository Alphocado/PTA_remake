<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\Guest;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\DataAbsenController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaReadController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\UserController;

Route::redirect('/', '/dashboard');

Route::get('/login', [LoginController::class, 'index'])->middleware(Guest::class);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', [LoginController::class, 'logout']);


Route::middleware(['check-role1'])->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index']);
  Route::resource('/absensi', AbsenController::class);
  Route::resource('/data-absen', DataAbsenController::class);
  Route::resource('/siswa', SiswaReadController::class);
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

Route::post('/absen-siswa/{id}', [AbsenController::class, 'getSiswa']);
Route::post('/data-absen/{id}', [DataAbsenController::class, 'getData']);
Route::post('/tanggal-select', [DataAbsenController::class, 'getTgl']);
