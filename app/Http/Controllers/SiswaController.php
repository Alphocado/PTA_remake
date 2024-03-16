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
    //
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
