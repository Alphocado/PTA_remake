<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Guru;
use App\Models\SubMenu;

class DashboardController extends Controller
{
  public function index()
  {
    if (auth()->user()->role == 1) {
      return view('dashboard/index', [
        'title' => 'Dashboard',
        'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
        'sub_menus' => SubMenu::select('role', 'name')->get(),
        'guru' => Guru::where('nis', auth()->user()->nis)->first(),
      ]);
    } else {
      return view('dashboard/admin', [
        'title' => 'Dashboard',
        'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
        'sub_menus' => SubMenu::select('role', 'name')->get(),
        // 'guru' => Guru::where('nis', auth()->user()->nis)->first(),
      ]);
    }
  }

  public function edit(string $nis)
  {
    if (auth()->user()->role == 1) {
      if (auth()->user()->nis == $nis) {
        return view('dashboard/admin', [
          'title' => 'Dashboard',
          'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
          'sub_menus' => SubMenu::select('role', 'name')->get()
        ]);
      } else {
        return redirect('/dashboard')->with('warning', 'Tidak bisa edit akun yang bukan milik mu');
      }
    }
  }
}
