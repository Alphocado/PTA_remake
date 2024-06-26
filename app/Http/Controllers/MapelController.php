<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Mapel;
use App\Models\Guru;
use App\Models\Kelas;

class MapelController extends Controller
{
  /**
   * Display a listing of the resource.
   */

  public function index()
  {
    $mapel = Mapel::select('id', 'nama')->filter(request(['search']))->paginate(10);

    // Load the related gurus for each mapel to display in the view
    $mapel->load('gurus');

    return view('dashboard/daftar-mapel/index', [
      'title' => 'Daftar Mapel',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'mapel' => $mapel,
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validateData = $request->validate([
      'nama' => 'required|max:255'
    ]);
    Mapel::create($validateData);

    return redirect('/daftar-mapel')->with('success', 'Mata pelajaran baru telah ditambahkan');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    return view('dashboard/daftar-mapel/edit', [
      'title' => 'Edit Mapel',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'mapel' => Mapel::select('nama', 'id')->where('id', $id)->first()
    ]);
  }
  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $rules = [
      'nama' => 'required|max:255'
    ];
    $validatedData = $request->validate($rules);
    Mapel::where('id', $id)->update($validatedData);
    return redirect('/daftar-mapel')->with('success', 'Mata pelajaran berhasil diubah');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    Mapel::destroy($id);
    return redirect('/daftar-mapel')->with('success', 'Post has been deleted!');
  }
}
