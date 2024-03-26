<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Guru;
use App\Models\SubMenu;
use App\Models\Mapel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
        $guru = Guru::where('nis', $nis)->first();
        // $user = User::where('nis', $nis)->first();
        // $imageName = $guru->image;
        return view('dashboard/edit', [
          'title' => 'Dashboard',
          'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
          'sub_menus' => SubMenu::select('role', 'name')->get(),
          'guru' => $guru,
          'mapel' => Mapel::all(),
          // 'imageName' => $imageName
        ]);
      } else {
        return redirect('/dashboard')->with('warning', 'Tidak bisa edit akun yang bukan milik mu');
      }
    }
  }


  public function update(Request $request, $nis)
  {
    $rules = $request->validate([
      'nama' => 'required|string|max:255',
      'nis' => 'required|string|max:255',
      'mata_pelajaran' => 'required',
      'jenis_kelamin' => 'required|in:laki-laki,perempuan',
      'agama' => 'required|in:islam,kristen,katolik,buddha,hindu',
      'alamat' => 'required|string|max:255',
      'tgl_lahir' => 'required|date',
      'image' => 'image|file|max:1024',
      'oldpw' => 'nullable|string',
      'newpw' => 'nullable|string|different:oldpw',
    ]);
    $user = User::where('nis', $nis)->first();
    $guru = Guru::where('nis', $nis)->first();


    if ($request->file('image')) {
      if ($request->oldImage) {
        Storage::delete($request->oldImage);
      }
      $rules['image'] = $request->file('image')->store('profile');
    }
    if (!empty($rules['newpw'])) {
      if (!empty($rules['oldpw'])) {
        if (!Hash::check($rules['oldpw'], $user->password)) {
          return redirect()->back()->with('warning', 'Password lama salah');
        }
        $pass = Hash::make($rules['newpw']);
      }
    } else {
      $pass = $user->password;
    }
    try {
      $guru->update([
        'nama' => $rules['nama'],
        'nis' => $rules['nis'],
        'mata_pelajaran' => $rules['mata_pelajaran'],
        'jenis_kelamin' => $rules['jenis_kelamin'],
        'agama' => $rules['agama'],
        'alamat' => $rules['alamat'],
        'tgl_lahir' => $rules['tgl_lahir'],
        'image' => $rules['image']
      ]);
      $user->update([
        'name' => $rules['nama'],
        'nis' => $rules['nis'],
        'password' => $pass,
      ]);
      return redirect('/dashboard')->with('success', 'Edit berhasil');
    } catch (\Exception $e) {
      return redirect('/dashboard')->with('error', 'Gagal edit, ada yang salah');
    }
  }
}
