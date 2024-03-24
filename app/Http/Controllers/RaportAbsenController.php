<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Kelas;
use App\Models\Absen;

class RaportAbsenController extends Controller
{
  public function index()
  {
    return view('dashboard/raport/index', [
      'title' => 'Raport Absensi',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'sub_menus' => SubMenu::select('role', 'name')->get(),
      'kelas' => Kelas::select('id', 'nama')->get(),
    ]);
  }
  public function show(string $id)
  {
    $absen = Absen::selectRaw('siswa, COUNT(CASE WHEN absen = "hadir" THEN 1 END) AS hadir_count, COUNT(CASE WHEN absen = "sakit" THEN 1 END) AS sakit_count, COUNT(CASE WHEN absen = "izin" THEN 1 END) AS izin_count, COUNT(CASE WHEN absen = "alpha" THEN 1 END) AS alpha_count')
      ->where('kelas', $id)
      ->groupBy('siswa')
      ->get();

    return view('dashboard/raport/show', [
      'title' => 'Raport Absensi',
      'absen' => $absen,
      'kelas' => Kelas::where('id', $id)->first(),
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'sub_menus' => SubMenu::select('role', 'name')->get(),
    ]);
  }
}
