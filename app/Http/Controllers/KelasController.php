<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;

class KelasController extends Controller
{
  public function index()
  {
    return view('dashboard/daftar-kelas/index', [
      'title' => 'Siswa',
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
    ]);
  }
}
