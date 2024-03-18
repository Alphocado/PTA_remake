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
    return view('dashboard/daftar-mapel/index', [
      'title' => 'Siswa',
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
      'mapel' => Mapel::all(),
      'guru' => Guru::all()
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
      'nama' => 'required|max:255'
    ]);
    Mapel::create($validateData);

    return redirect('/daftar-mapel')->with('success', 'Mata pelajaran baru telah ditambahkan');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    return view('dashboard/daftar-mapel/edit', [
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
      'title' => 'edit mapel',
      'mapel' => Mapel::findOrFail($id)
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
