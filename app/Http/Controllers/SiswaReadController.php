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
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'sub_menus' => SubMenu::select('role', 'name')->get(),
      'siswa' => Siswa::select('nama', 'nis', 'kelas', 'id')->get()
    ]);
  }

  public function show($id)
  {
    return view('dashboard/siswa/show', [
      'title' => 'Siswa',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'sub_menus' => SubMenu::select('role', 'name')->get(),
      'siswa' => Siswa::select('nama', 'kelas', 'jenis_kelamin', 'agama', 'alamat', 'tgl_lahir')->where('id', $id)->first()
    ]);
  }
}
