<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\Mapel;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
  public function index()
  {
    return view('dashboard/daftar-guru/index', [
      'title' => 'Guru',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'sub_menus' => SubMenu::select('role', 'name')->get(),
      'guru' => Guru::select('guru.*', 'mapel.nama as kelas_nama')
        ->leftJoin('mapel', 'guru.mata_pelajaran', '=', 'mapel.id')->filter(request(['search']))->paginate(10),

      'mapel' => Mapel::select('id', 'nama')->get(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validateData = $request->validate([
      'nama' => 'required|max:255',
      'nis' => 'required|size:9|numeric|unique:users|unique:guru',
      'email' => 'required|email',
      'password' => 'required',
      'mata_pelajaran' => 'required|not_in:mapel',
      'jenis_kelamin' => 'required',
      'agama' => 'required|in:islam,kristen,katolik,buddha,hindu',
      'alamat' => 'required|max:255',
      'tgl_lahir' => 'required|date'
    ]);
    $guru = [
      'nama' => $validateData['nama'],
      'nis' => $validateData['nis'],
      'mata_pelajaran' => $validateData['mata_pelajaran'],
      'jenis_kelamin' => $validateData['jenis_kelamin'],
      'agama' => $validateData['agama'],
      'alamat' => $validateData['alamat'],
      'tgl_lahir' => $validateData['tgl_lahir']
    ];
    $user = [
      'name' => $validateData['nama'],
      'nis' => $validateData['nis'] . '',
      'email' => $validateData['email'],
      'role' => 1,
      'password' => $validateData['password']
    ];
    User::create($user);
    Guru::create($guru);

    return redirect('/daftar-guru')->with('success', 'Data baru telah ditambahkan');
  }

  /**
   * Display the specified resource.
   */
  public function show(string $nis)
  {
    return view('dashboard/daftar-guru/show', [
      'title' => 'Guru',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'sub_menus' => SubMenu::select('role', 'name')->get(),
      'guru' => Guru::where('nis', $nis)->first(),
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $nis)
  {
    return view('dashboard/daftar-guru/edit', [
      'title' => 'Guru',
      'menus' => Menu::select('name', 'slug', 'logo', 'role')->get(),
      'sub_menus' => SubMenu::select('role', 'name')->get(),
      'guru' => Guru::where('nis', $nis)->first(),
      'mapel' => Mapel::select('id', 'nama')->get(),
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $nis)
  {
    $rules = $request->validate([
      'nama' => 'required|string|max:255',
      'mata_pelajaran' => 'required',
      'jenis_kelamin' => 'required|in:laki-laki,perempuan',
      'agama' => 'required|in:islam,kristen,katolik,buddha,hindu',
      'alamat' => 'required|string|max:255',
      'tgl_lahir' => 'required|date',
      'image' => 'image|file|max:1024',
      'pw' => 'nullable|string',
    ]);
    $user = User::where('nis', $nis)->first();
    $guru = Guru::where('nis', $nis)->first();

    if ($request->file('image')) {
      if ($request->oldImage) {
        Storage::delete($request->oldImage);
      }
      $rules['image'] = $request->file('image')->store('profile');
    }

    if (!empty($rules['pw'])) {
      if (!Hash::check($rules['pw'], $user->password)) {
        return redirect()->back()->with('warning', 'Password lama salah');
      }
      $pass = Hash::make($rules['pw']);
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
      return redirect('/daftar-guru')->with('success', 'Edit berhasil');
    } catch (\Exception $e) {
      return redirect('/daftar-guru')->with('error', 'Gagal edit, ada yang salah');
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $nis)
  {
    // dd($request->nis);
    User::where('nis', $nis)->delete();
    Guru::where('nis', $nis)->delete();
    return redirect('/daftar-guru')->with('success', 'Data guru telah dihapus');
  }
}
