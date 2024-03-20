<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\User;
use App\Models\Guru;

class UserController extends Controller
{
  public function index()
  {
    return view('dashboard/daftar-user/index', [
      'title' => 'Siswa',
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
      'user' => User::where('role', '!=', 3)->get()
    ]);
  }

  public function store(Request $request)
  {
    $validateData = $request->validate([
      'name' => 'required|max:255',
      'nis' => 'required|size:9',
      'email' => 'required|email',
      'role' => 'required',
      'password' => 'required',
    ]);
    User::create($validateData);
    return redirect('/daftar-user')->with('success', 'Data baru telah ditambahkan');
  }

  public function show($id)
  {
    return view('dashboard/daftar-user/show', [
      'title' => 'User',
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
      'user' => User::findOrFail($id)
    ]);
  }

  public function update(Request $request, $id)
  {
    $validateData = $request->validate([
      'name' => 'required|max:255',
      'nis' => 'required|size:9',
      'role' => 'required|in:1,2',
    ]);
    $guru = [
      'nama' => $validateData['name'],
      'nis' => $validateData['nis'],
    ];
    $existingGuru = Guru::where('nis', $validateData['nis'])->first();
    if ($existingGuru) {
      Guru::where('nis', $validateData['nis'])->update($guru);
    }

    User::findOrFail($id)->update($validateData);

    return redirect('/daftar-user')->with('success', 'Edit berhasil');
  }

  public function edit($id)
  {
    return view('dashboard/daftar-user/edit', [
      'title' => 'User',
      'menus' => Menu::all(),
      'sub_menus' => SubMenu::all(),
      'user' => User::findOrFail($id)
    ]);
  }

  public function destroy(string $id, Request $request)
  {
    Guru::where('nis', $request->nis)->delete();
    User::destroy($id);
    return redirect('/daftar-guru')->with('success', 'Data guru telah dihapus');
  }
}
