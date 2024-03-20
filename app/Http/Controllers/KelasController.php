<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Kelas;
use App\Models\Guru;

class KelasController extends Controller
{
  /**
   * Display a listing of the resource.
   */

  public function index()
  {
    return view('dashboard/daftar-kelas/index', [
      'title' => 'Kelas',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'sub_menus' => SubMenu::select('role', 'name')->get(),
      'kelas' => Kelas::select('nama', 'id_wali_kelas', 'id')->get(),
      'guru' => Guru::select('id', 'nama')->get()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validateData = $request->validate([
      'nama' => 'required|max:255',
      'id_wali_kelas' => 'required|not_in:wali'
    ]);
    Kelas::create($validateData);

    return redirect('/daftar-kelas')->with('success', 'Kelas baru telah ditambahkan');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    return view('dashboard/daftar-kelas/edit', [
      'title' => 'Edit Kelas',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'sub_menus' => SubMenu::select('role', 'name')->get(),
      'kelas' => Kelas::select('nama', 'id_wali_kelas', 'id')->first(),
      'guru' => Guru::select('id', 'nama')->get()
    ]);
  }
  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    $rules = [
      'nama' => 'required|max:255',
      'id_wali_kelas' => 'required|not_in:wali'
    ];
    $validatedData = $request->validate($rules);
    Kelas::where('id', $id)->update($validatedData);
    return redirect('/daftar-kelas')->with('success', 'Data kelas berhasil diubah');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    Kelas::destroy($id);
    return redirect('/daftar-kelas')->with('success', 'Post has been deleted!');
  }
}
