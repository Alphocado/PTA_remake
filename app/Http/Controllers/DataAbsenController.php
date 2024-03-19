<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Absen;


class DataAbsenController extends Controller
{

  public function getData(Request $request)
  {
    $kode = $request->input('kode');
    $absen = Absen::where('mata_pelajaran', $kode)
      ->orderBy('tgl_buat', 'desc')
      ->get();
    $filteredAbsen = collect();

    foreach ($absen as $record) {
      $siswaId = $record->siswa;
      if (!$filteredAbsen->has($siswaId)) {
        $filteredAbsen[$siswaId] = $record;
      }
    }
    $filteredAbsen = $filteredAbsen->values()->all();

    return view('partials/data-absen', ['absen' => $filteredAbsen])->render();
  }

  public function index()
  {
    return view('dashboard/absensi/show', [
      'title' => 'Absensi',
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
      'kelas' => Kelas::all(),
    ]);
  }

  public function show(string $id)
  {
    $absensi = Absen::where('kelas', $id)->latest('tgl_buat')->get();
    $absensiCheck = Absen::where('kelas', $id)->latest('tgl_buat')->first();


    return view('dashboard.absensi.detail', [
      'title' => 'Absensi',
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
      'kelas' => Kelas::where('id', $absensiCheck->kelas)->first(),
      'mapel' => Mapel::all(),
      'absen' => $absensi,
      'siswa' => Siswa::all(),
    ]);
  }
}