<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
  public function index()
  {
    $user = auth()->user();
    $guru = Guru::where('nis', $user->nis)->first();

    if ($user->role == 1) {
      return view('dashboard.index', [
        'title' => 'Dashboard',
        'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
        'guru'  => $guru,
      ]);
    } else {
      return view('dashboard.admin', [
        'title' => 'Dashboard',
        'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      ]);
    }
  }

  public function edit(string $nis)
  {
    $user = auth()->user();

    if ($user->role == 1 && $user->nis == $nis) {
      $guru = Guru::where('nis', $nis)->first();
      return view('dashboard.edit', [
        'title' => 'Edit Profile',
        'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
        'guru'  => $guru,
        'mapel' => Mapel::all(),
      ]);
    } else {
      return redirect('/dashboard')->with('warning', 'Tidak bisa edit akun yang bukan milikmu');
    }
  }

  public function update(Request $request, $nis)
  {
    $rules = $request->validate([
      'nama'            => 'required|string|max:255',
      'mata_pelajaran'  => 'required',
      'jenis_kelamin'   => 'required|in:laki-laki,perempuan',
      'agama'           => 'required|in:islam,kristen,katolik,buddha,hindu',
      'alamat'          => 'required|string|max:255',
      'tgl_lahir'       => 'required|date',
      'image'           => 'image|file|max:1024',
      'oldpw'           => 'nullable|string',
      'newpw'           => 'nullable|string|different:oldpw',
    ]);

    $user = User::where('nis', $nis)->first();
    $guru = Guru::where('nis', $nis)->first();

    if ($request->file('image')) {
      $rules['image'] = $request->file('image')->store('profile');
      if ($request->oldImage) {
        Storage::delete($request->oldImage);
      }
    }

    if (!empty($rules['newpw'])) {
      if (!empty($rules['oldpw']) && !Hash::check($rules['oldpw'], $user->password)) {
        return redirect()->back()->with('warning', 'Password lama salah');
      }
      $pass = Hash::make($rules['newpw']);
    } else {
      $pass = $user->password;
    }

    try {
      $guru->update($rules);
      $user->update(['name' => $rules['nama'], 'password' => $pass]);
      return redirect('/dashboard')->with('success', 'Edit berhasil');
    } catch (\Exception $e) {
      return redirect('/dashboard')->with('error', 'Gagal edit, ada yang salah');
    }
  }
}
