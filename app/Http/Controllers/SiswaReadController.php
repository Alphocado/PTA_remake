<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;

class SiswaReadController extends Controller
{
  public function index()
  {
    return view('dashboard/siswa/index', [
      'title' => 'Siswa',
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
    ]);
  }
}
