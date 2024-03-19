<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Siswa;
// use App\Models\Guru;

class AbsenController extends Controller
{
  public function getSiswa(Request $request)
  {
    $kode = $request->input('kode');
    $siswa = Siswa::where('kelas', $kode)->get();
    return view('partials/absen-table', ['siswa' => $siswa])->render();
  }
  public function index()
  {
    return view('dashboard/absensi/index', [
      'title' => 'Absensi',
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
      'kelas' => Kelas::all(),
      'siswa' => Siswa::all(),
      'mapel' => Mapel::all()
    ]);
  }
}
