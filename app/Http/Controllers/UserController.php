<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\User;

class UserController extends Controller
{
  public function index()
  {
    return view('dashboard/daftar-user/index', [
      'title' => 'Siswa',
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
      'user' => User::all()
    ]);
  }
}
