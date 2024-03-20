<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Mapel;
use App\Models\Guru;
use App\Models\User;

class GuruController extends Controller
{
  public function index()
  {
    return view('dashboard/daftar-guru/index', [
      'title' => 'Guru',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'sub_menus' => SubMenu::select('role', 'name')->get(),
      'guru' => Guru::select('guru.*', 'mapel.nama as kelas_nama')
        ->leftJoin('mapel', 'guru.mata_pelajaran', '=', 'mapel.id')->filter(request(['search']))->paginate(10),

      'mapel' => Mapel::select('id', 'nama')->get(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validateData = $request->validate([
      'nama' => 'required|max:255',
      'nis' => 'required|size:9',
      'email' => 'required|email',
      'password' => 'required',
      'mata_pelajaran' => 'required|not_in:mapel',
      'jenis_kelamin' => 'required',
      'agama' => 'required|in:islam,kristen,katolik,buddha,hindu',
      'alamat' => 'required|max:255',
      'tgl_lahir' => 'required|date'
    ]);
    $guru = [
      'nama' => $validateData['nama'],
      'nis' => $validateData['nis'],
      'mata_pelajaran' => $validateData['mata_pelajaran'],
      'jenis_kelamin' => $validateData['jenis_kelamin'],
      'agama' => $validateData['agama'],
      'alamat' => $validateData['alamat'],
      'tgl_lahir' => $validateData['tgl_lahir']
    ];
    $user = [
      'name' => $validateData['nama'],
      'nis' => $validateData['nis'] . '',
      'email' => $validateData['email'],
      'role' => 1,
      'password' => $validateData['password']
    ];
    User::create($user);
    Guru::create($guru);

    return redirect('/daftar-guru')->with('success', 'Data baru telah ditambahkan');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    return view('dashboard/daftar-guru/show', [
      'title' => 'Guru',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'sub_menus' => SubMenu::select('role', 'name')->get(),
      'guru' => Guru::select('nama', 'mata_pelajaran', 'jenis_kelamin', 'agama', 'alamat', 'tgl_lahir')->first(),
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    return view('dashboard/daftar-guru/edit', [
      'title' => 'Guru',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'sub_menus' => SubMenu::select('role', 'name')->get(),
      'guru' => Guru::findOrFail($id),
      'mapel' => Mapel::select('id', 'nama')->get(),
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $validatedData = $request->validate([
      'nama' => 'required|max:255',
      'nis' => 'required|size:9|unique',
      'mata_pelajaran' => 'required|not_in:mapel',
      'jenis_kelamin' => 'required',
      'agama' => 'required|in:islam,kristen,katolik,buddha,hindu',
      'alamat' => 'required|max:255',
      'tgl_lahir' => 'required|date'
    ]);
    Guru::where('id', $id)->update($validatedData);
    return redirect('/daftar-guru')->with('success', 'Data guru berhasil diubah');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id, Request $request)
  {
    // dd($request->nis);
    User::where('nis', $request->nis)->delete();
    Guru::destroy($id);
    return redirect('/daftar-guru')->with('success', 'Data guru telah dihapus');
  }
}
