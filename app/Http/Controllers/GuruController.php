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
      'title' => 'Siswa',
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
      'mapel' => Mapel::all()
    ]);
  }
}
