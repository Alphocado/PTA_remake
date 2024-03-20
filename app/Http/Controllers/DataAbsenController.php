<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Absen;


class DataAbsenController extends Controller
{
  public function getData(Request $request)
  {
    $kode = $request->input('kode');
    $tgl_buat = $request->input('tgl_buat');
    $kelas = $request->input('kelas');
    $absen = Absen::where('mata_pelajaran', $kode)
      ->where('tgl_buat', $tgl_buat)
      ->where('kelas', $kelas)
      ->orderBy('jam_buat', 'desc')
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

  public function getTgl(Request $request)
  {
    $tanggal = $request->input('kode');
    $kelas = $request->input('kelas');
    return view('partials/tanggal-select', ['tgl_buat' => $tanggal, 'kelas' => $kelas, 'mapel' => Mapel::select('id', 'nama')->get()])->render();
  }

  public function index()
  {
    return view('dashboard/absensi/show', [
      'title' => 'Absensi',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'sub_menus' => SubMenu::select('role', 'name')->get(),
      'kelas' => Kelas::select('id', 'nama')->get(),
    ]);
  }

  public function show(string $id)
  {
    // $absensi = Absen::where('kelas', $id)->latest('tgl_buat')->get();
    $absensiCheck = Absen::where('kelas', $id)->latest('tgl_buat')->select('kelas')->first();
    $tgl_buat = Absen::distinct()->pluck('tgl_buat');
    if ($absensiCheck) {
      return view('dashboard.absensi.detail', [
        'title' => 'Absensi',
        'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
        'sub_menus' => SubMenu::select('role', 'name')->get(),
        'kelas' => Kelas::where('id', $absensiCheck->kelas)->select('id', 'nama')->first(),
        'mapel' => Mapel::all(),
        'tgl_buat' => $tgl_buat
      ]);
    } else {
      return view('dashboard.absensi.error', [
        'title' => 'Absensi',
        'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
        'sub_menus' => SubMenu::select('role', 'name')->get(),
        'kelas' => Kelas::where('id', $id)->select('nama')->first()
      ]);
    }
  }
}
