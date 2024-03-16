<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;

class AbsenController extends Controller
{
  public function index()
  {

    return view('dashboard/absensi/index', [
      'title' => 'Absensi',
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
    ]);
  }
}
