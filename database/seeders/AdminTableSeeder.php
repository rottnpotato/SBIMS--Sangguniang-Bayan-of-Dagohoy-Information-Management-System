<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('admin')->insert([
      [
        'admin_id' => 1,
        'username' => 'elias',
        'password' =>
          '$2y$10$H7obJEdmLzqqcPy7wQWhsOLUvrgzC8f1Y1or2Gxaza5z1PT0tvLy6',
        'fname' => 'Elias',
        'lname' => 'Abdurrahman',
      ],
      [
        'admin_id' => 2,
        'username' => 'admin_marvs',
        'password' => '1234',
        'fname' => 'Marvs',
        'lname' => 'Pacot',
      ],
    ]);
  }
}
