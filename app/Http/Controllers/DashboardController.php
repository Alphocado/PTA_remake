<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;

class DashboardController extends Controller
{
  public function index()
  {
    return view('dashboard/index', [
      'title' => 'Dashboard',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'sub_menus' => SubMenu::select('role', 'name')->get(),
    ]);
  }
}
