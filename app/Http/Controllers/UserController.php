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
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'user' => User::select('name', 'nis', 'email', 'role', 'id')->where('role', '!=', 2)->get()
    ]);
  }

  // public function store(Request $request)
  // {
  //   $validateData = $request->validate([
  //     'name' => 'required|max:255',
  //     'nis' => 'required|max:9|numeric|unique.users',
  //     'email' => 'required|email',
  //     'role' => 'required',
  //     'password' => 'required',
  //   ]);
  //   User::create($validateData);
  //   return redirect('/daftar-user')->with('success', 'Data baru telah ditambahkan');
  // }

  // public function show($id)
  // {
  //   return view('dashboard/daftar-user/show', [
  //     'title' => 'User',
  //     'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
  //     'user' => User::select('name', 'nis')->where('id', $id)->first()
  //   ]);
  // }

  // public function update(Request $request, $id)
  // {
  //   $validateData = $request->validate([
  //     'name' => 'required|max:255',
  //     'nis' => 'required|max:9|numeric|unique:guru',
  //     'role' => 'required|in:1,2',
  //   ]);
  //   $guru = [
  //     'nama' => $validateData['name'],
  //     'nis' => $validateData['nis'],
  //   ];
  //   $existingGuru = Guru::where('nis', $validateData['nis'])->first();
  //   if ($existingGuru) {
  //     Guru::where('nis', $validateData['nis'])->update($guru);
  //   }

  //   User::findOrFail($id)->update($validateData);

  //   return redirect('/daftar-user')->with('success', 'Edit berhasil');
  // }

  public function edit($id)
  {
    return view('dashboard/daftar-user/edit', [
      'title' => 'User',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'user' => User::select('id', 'name', 'nis', 'role')->where('id', $id)->first()
    ]);
  }

  public function destroy(string $id, Request $request)
  {
    Guru::where('nis', $request->nis)->delete();
    User::destroy($id);
    return redirect('/daftar-guru')->with('success', 'Data guru telah dihapus');
  }
}
