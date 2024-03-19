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

  public function store(Request $request)
  {
    $absenValues = [];

    // Loop through all request inputs
    foreach ($request->all() as $key => $value) {
      // Check if the input key starts with 'absen-'
      if (strpos($key, 'absen-') === 0) {
        // Extract the ID from the input key
        $id = substr($key, strlen('absen-'));

        // Add the ID and its corresponding value to the array
        $absenValues[$id] = $value;
      }
    }

    // Validate the main request data
    $validatedData = $request->validate([
      'guru' => 'required',
      'mata_pelajaran' => 'required|not_in:mapel',
      'kelas' => 'required|not_in:kelas',
    ]);

    // Loop through the absenValues and create Absen records
    foreach ($absenValues as $id => $absen) {
      $absenData = array_merge($validatedData, ['absen' => $absen, 'siswa' => $id]);
      Absen::create($absenData);
    }

    return redirect('/absensi')->with('success', 'Data baru telah ditambahkan');
  }
}
