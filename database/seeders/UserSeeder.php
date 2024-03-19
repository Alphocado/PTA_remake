<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    User::create([
      'name' => 'admin',
      'nis' => '3',
      'email' => 'admin@gmail.com',
      'role' => '3',
      'password' => 'admin'
    ]);

    User::create([
      'name' => 'mod',
      'nis' => '2',
      'email' => 'mod@gmail.com',
      'role' => '2',
      'password' => 'mod'
    ]);
  }
}
