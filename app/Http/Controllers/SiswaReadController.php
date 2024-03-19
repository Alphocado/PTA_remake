<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Siswa;

class SiswaReadController extends Controller
{
  public function index()
  {
    return view('dashboard/siswa/index', [
      'title' => 'Siswa',
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
      'siswa' => Siswa::all()
    ]);
  }

  public function show($id)
  {
    return view('dashboard/siswa/show', [
      'title' => 'Siswa',
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
      'siswa' => Siswa::findOrFail($id)
    ]);
  }
}
