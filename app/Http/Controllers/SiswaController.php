<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Kelas;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('dashboard/daftar-siswa/index', [
      'title' => 'Siswa',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'sub_menus' => SubMenu::select('role', 'name')->get(),
      'siswa' => Siswa::select('siswa.*', 'kelas.nama as kelas_nama')
        ->leftJoin('kelas', 'siswa.kelas', '=', 'kelas.id')->filter(request(['search']))->paginate(10),
      'kelas' => Kelas::select('id', 'nama')->get()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validateData = $request->validate([
      'nama' => 'required|max:255',
      'nis' => 'required|numeric|unique:siswa',
      'kelas' => 'required|not_in:kelas',
      'jenis_kelamin' => 'required',
      'agama' => 'required|not_in:agama',
      'alamat' => 'required|max:255',
      'tgl_lahir' => 'required|date'
    ]);
    Siswa::create($validateData);

    return redirect('/daftar-siswa')->with('success', 'Data baru telah ditambahkan');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $nis)
  {
    $siswa = Siswa::where('nis', $nis)->first();
    $kelas = Kelas::select('nama')->where('id', $siswa->kelas)->first();

    return view('dashboard/daftar-siswa/show', [
      'title' => 'Siswa',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'sub_menus' => SubMenu::select('role', 'name')->get(),
      'siswa' => $siswa,
      'kelas' => $kelas,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $nis)
  {
    return view('dashboard/daftar-siswa/edit', [
      'title' => 'Guru',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'sub_menus' => SubMenu::select('role', 'name')->get(),
      'siswa' => Siswa::where('nis', $nis)->first(),
      'kelas' => Kelas::select('id', 'nama')->get(),
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $nis)
  {
    $validateData = $request->validate([
      'nama' => 'required|max:255',
      'kelas' => 'required',
      'jenis_kelamin' => 'required',
      'agama' => 'required|in:islam,kristen,katolik,buddha,hindu',
      'alamat' => 'required|max:255',
      'tgl_lahir' => 'required|date',
      'image' => 'image|file|max:1024',
    ]);

    if ($request->file('image')) {
      if ($request->oldImage) {
        Storage::delete($request->oldImage);
      }
      $validateData['image'] = $request->file('image')->store('profile');
    }

    Siswa::where('nis', $nis)->update($validateData);
    return redirect('/daftar-siswa')->with('success', 'Data siswa berhasil diubah');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $nis)
  {
    Siswa::where('nis', $nis)->delete();
    return redirect('/daftar-siswa')->with('success', 'Data siswa telah dihapus');
  }
}
