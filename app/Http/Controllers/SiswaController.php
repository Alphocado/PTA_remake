<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Kelas;

class SiswaController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    return view('dashboard/daftar-siswa/index', [
      'title' => 'Siswa',
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
      'siswa' => Siswa::all(),
      'kelas' => Kelas::all()
    ]);
  }


  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validateData = $request->validate([
      'nama' => 'required|max:255',
      'nis' => 'required|size:9',
      'kelas' => 'required|not_in:kelas',
      'jenis_kelamin' => 'required',
      'agama' => 'required|in:islam,kristen,katolik,buddha,hindu',
      'alamat' => 'required|max:255',
      'tgl_lahir' => 'required|date'
    ]);
    Siswa::create($validateData);

    return redirect('/daftar-siswa')->with('success', 'Data baru telah ditambahkan');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $siswa = Siswa::findOrFail($id);
    $kelas = Kelas::findOrFail($siswa->kelas);

    return view('dashboard/daftar-siswa/show', [
      'title' => 'Siswa',
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
      'siswa' => $siswa,
      'kelas' => $kelas,
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    return view('dashboard/daftar-siswa/edit', [
      'title' => 'Guru',
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
      'siswa' => Siswa::findOrFail($id),
      'kelas' => Kelas::all(),
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $validateData = $request->validate([
      'nama' => 'required|max:255',
      'nis' => 'required|size:9',
      'kelas' => 'required',
      'jenis_kelamin' => 'required',
      'agama' => 'required|in:islam,kristen,katolik,buddha,hindu',
      'alamat' => 'required|max:255',
      'tgl_lahir' => 'required|date'
    ]);
    Siswa::where('id', $id)->update($validateData);
    return redirect('/daftar-siswa')->with('success', 'Data siswa berhasil diubah');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    Siswa::destroy($id);
    return redirect('/daftar-siswa')->with('success', 'Data siswa telah dihapus');
  }
}
