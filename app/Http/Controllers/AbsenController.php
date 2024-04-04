<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Absen;
use App\Models\Guru;

class AbsenController extends Controller
{
  public function getSiswa(Request $request)
  {
    $kode   = $request->input('kode');
    $siswa  = Siswa::where('kelas', $kode)->select('nama', 'nis', 'id')->get();
    return view('partials.absen-table', compact('siswa'));
  }

  public function index()
  {
    $user = auth()->user();
    $guru = Guru::where('nis', $user->nis)->first();
    if (!$guru) {
      abort(403, 'Unauthorized action.');
    }

    return view('dashboard.absensi.index', [
      'title' => 'Absensi',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'kelas' => Kelas::select('id', 'nama')->get(),
      'mapel' => Mapel::select('id', 'nama')->get(),
      'guru'  => $guru,
    ]);
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'guru'            => 'required',
      'mata_pelajaran'  => 'required',
      'kelas'           => 'required|not_in:kelas',
    ]);

    $tgl_buat   = now()->toDateString();
    $absenData  = [];

    foreach ($request->all() as $key => $value) {
      if (strpos($key, 'absen-') === 0) {
        $id = substr($key, strlen('absen-'));
        $absenData[$id] = $value;
      }
    }

    try {
      foreach ($absenData as $id => $absen) {
        $existingAbsen = Absen::where('siswa', $id)
          ->where('mata_pelajaran', $validatedData['mata_pelajaran'])
          ->where('kelas', $validatedData['kelas'])
          ->where('tgl_buat', $tgl_buat)
          ->first();

        if ($existingAbsen) {
          $existingAbsen->where('siswa', $id)
            ->where('mata_pelajaran', $validatedData['mata_pelajaran'])
            ->where('kelas', $validatedData['kelas'])
            ->where('tgl_buat', $tgl_buat)
            ->update(['absen' => $absen]);
        } else {
          $absenData = array_merge($validatedData, ['absen' => $absen, 'siswa' => $id, 'tgl_buat' => $tgl_buat]);
          Absen::create($absenData);
        }
      }
      return redirect('/absensi')->with('success', 'Data baru telah ditambahkan');
    } catch (\Exception $e) {
      return redirect('/absensi')->with('error', 'Ada yang salah');
    }
  }
}
