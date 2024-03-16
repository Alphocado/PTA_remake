<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;

class MapelController extends Controller
{
  public function index()
  {
    return view('dashboard/daftar-mapel/index', [
      'title' => 'Siswa',
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
    ]);
  }
}
