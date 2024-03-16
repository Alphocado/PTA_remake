<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubMenu;

class SubMenuSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    SubMenu::create([
      'name' => '',
      'role' => 1,
    ]);
    SubMenu::create([
      'name' => 'moderator',
      'role' => 2,
    ]);
    SubMenu::create([
      'name' => 'admin',
      'role' => 3,
    ]);
  }
}
