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
    // $siswa = Siswa::select('nama', 'nis', 'kelas', 'id');

    // if (request('search')) {
    //   $siswa->where('nama', 'like', '%' . request('search') . '%')
    //     ->orWhere('kelas', 'like', '%' . (request('search')) . '%')
    //     ->orWhere('nis', 'like', '%' . request('search') . '%');
    // }

    // return view('dashboard/siswa/index', [
    //   'title' => 'Siswa',
    //   'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
    //   'siswa' => $siswa->get()
    // ]);

    return view('dashboard/siswa/index', [
      'title' => 'Siswa',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'siswa' => Siswa::select('siswa.*', 'kelas.nama as kelas_nama')
        ->leftJoin('kelas', 'siswa.kelas', '=', 'kelas.id')->filter(request(['search']))->paginate(10)
    ]);
  }

  public function show($id)
  {
    return view('dashboard/siswa/show', [
      'title' => 'Siswa',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'siswa' => Siswa::select('nama', 'nis', 'kelas', 'jenis_kelamin', 'agama', 'alamat', 'tgl_lahir')->where('id', $id)->first()
    ]);
  }
}
