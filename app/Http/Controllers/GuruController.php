<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Mapel;
use App\Models\Guru;

class GuruController extends Controller
{
  public function index()
  {
    return view('dashboard/daftar-guru/index', [
      'title' => 'Guru',
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
      'guru' => Guru::all(),
      'mapel' => Mapel::all(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validateData = $request->validate([
      'nama' => 'required|max:255',
      'mata_pelajaran' => 'required|not_in:mapel',
      'jenis_kelamin' => 'required',
      'agama' => 'required|in:islam,kristen,katolik,buddha,hindu',
      'alamat' => 'required|max:255',
      'tgl_lahir' => 'required|date'
    ]);
    Guru::create($validateData);

    return redirect('/daftar-guru')->with('success', 'Data baru telah ditambahkan');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    return view('dashboard/daftar-guru/show', [
      'title' => 'Guru',
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
      'guru' => Guru::findOrFail($id),
      'mapel' => Mapel::all(),
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    return view('dashboard/daftar-guru/edit', [
      'title' => 'Guru',
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
      'guru' => Guru::findOrFail($id),
      'mapel' => Mapel::all(),
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $validatedData = $request->validate([
      'nama' => 'required|max:255',
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
  public function destroy(string $id)
  {
    Guru::destroy($id);
    return redirect('/daftar-guru')->with('success', 'Data guru telah dihapus');
  }
}
