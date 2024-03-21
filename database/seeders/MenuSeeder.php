<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Menu::create([
      'name' => 'Dashboard',
      'logo' => 'fa-solid fa-house',
      'role' => 1,
      'slug' => 'dashboard',
    ]);

    Menu::create([
      'name' => 'Absensi',
      'logo' => 'fa-solid fa-list',
      'role' => 1,
      'slug' => 'absensi',
    ]);

    Menu::create([
      'name' => 'Data Absen',
      'logo' => 'fa-solid fa-check',
      'role' => 1,
      'slug' => 'data-absen',
    ]);

    Menu::create([
      'name' => 'Siswa',
      'logo' => 'fa-solid fa-people-simple',
      'role' => 1,
      'slug' => 'siswa',
    ]);

    Menu::create([
      'name' => 'Daftar Siswa',
      'logo' => 'fa-solid fa-people-roof',
      'role' => 2,
      'slug' => 'daftar-siswa',
    ]);

    Menu::create([
      'name' => 'Daftar Guru',
      'logo' => 'fa-solid fa-people-line',
      'role' => 2,
      'slug' => 'daftar-guru',
    ]);

    Menu::create([
      'name' => 'Daftar Kelas',
      'logo' => 'fa-solid fa-school',
      'role' => 2,
      'slug' => 'daftar-kelas',
    ]);

    Menu::create([
      'name' => 'Daftar Mapel',
      'logo' => 'fa-solid fa-laptop-file',
      'role' => 2,
      'slug' => 'daftar-mapel',
    ]);

    Menu::create([
      'name' => 'Daftar User',
      'logo' => 'fa-solid fa-user',
      'role' => 3,
      'slug' => 'daftar-user',
    ]);
  }
}
