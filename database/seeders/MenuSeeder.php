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
      'logo' => 'house-fill',
      'role' => 1,
    ]);

    Menu::create([
      'name' => 'Absensi',
      'logo' => 'file-earmark',
      'role' => 1,
    ]);

    Menu::create([
      'name' => 'Siswa',
      'logo' => 'people',
      'role' => 1,
    ]);

    Menu::create([
      'name' => 'Daftar Siswa',
      'logo' => 'file-earmark-text',
      'role' => 2,
    ]);

    Menu::create([
      'name' => 'Daftar Guru',
      'logo' => 'file-earmark-text',
      'role' => 2,
    ]);

    Menu::create([
      'name' => 'Daftar Kelas',
      'logo' => 'file-earmark-text',
      'role' => 2,
    ]);

    Menu::create([
      'name' => 'Daftar Mapel',
      'logo' => 'file-earmark-text',
      'role' => 2,
    ]);

    Menu::create([
      'name' => 'Daftar User',
      'logo' => 'file-earmark-text',
      'role' => 3,
    ]);

    Menu::create([
      'name' => 'Daftar Menu',
      'logo' => 'file-earmark-text',
      'role' => 3,
    ]);
  }
}
