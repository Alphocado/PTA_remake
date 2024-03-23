<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Absen;

class AbsenController extends Controller
{
  public function getSiswa(Request $request)
  {
    $kode = $request->input('kode');
    $siswa = Siswa::where('kelas', $kode)->select('nama', 'nis', 'id')->get();
    return view('partials/absen-table', ['siswa' => $siswa])->render();
  }

  public function index()
  {
    return view('dashboard/absensi/index', [
      'title' => 'Absensi',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'sub_menus' => SubMenu::select('role', 'name')->get(),
      'kelas' => Kelas::select('id', 'nama')->get(),
      'mapel' => Mapel::select('id', 'nama')->get()
    ]);
  }

  public function store(Request $request)
  {
    dd($request);
    $absenValues = [];
    $tgl_buat = date('Y-m-d');
    $jam_buat = date('H:i:s');
    foreach ($request->all() as $key => $value) {
      if (strpos($key, 'absen-') === 0) {
        $id = substr($key, strlen('absen-'));
        $absenValues[$id] = $value;
      }
    }

    $validatedData = $request->validate([
      'guru' => 'required',
      'mata_pelajaran' => 'required|not_in:mapel',
      'kelas' => 'required|not_in:kelas',
    ]);

    foreach ($absenValues as $id => $absen) {
      $absenData = array_merge($validatedData, ['absen' => $absen, 'siswa' => $id, 'tgl_buat' => $tgl_buat, 'jam_buat' => $jam_buat]);
      Absen::create($absenData);
    }

    return redirect('/absensi')->with('success', 'Data baru telah ditambahkan');
  }
}
