<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;

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
      'jenis_kelamin' => 'required',
      'kelas' => 'required|not_in:kelas',
      'agama' => 'required|in:islam,kristen,katolik,buddha,hindu',
      'alamat' => 'required|max:255',
      'tgl_lahir' => 'required|date'
    ]);

    return redirect('/daftar-siswa')->with('success', 'Data baru telah ditambahkan');
  }

  /**
   * Display the specified resource.
   */
  public function show(Siswa $siswa)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Siswa $siswa)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Siswa $siswa)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Siswa $siswa)
  {
    //
  }
}
