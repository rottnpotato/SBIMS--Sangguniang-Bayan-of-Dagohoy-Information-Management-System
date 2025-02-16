<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('schedule')->insert([
      [
        'id' => 14,
        'title' => 'Session',
        'start' => '2024-10-30 05:52:00',
        'committees' =>
          '["Committee on Energy, Science and Technology","Committee on Environmental Protection","Committee on Finance, Budget and Appropriation"]',
        'end' => '2024-10-31 21:53:00',
        'created_at' => '2024-10-15 13:57:44',
        'updated_at' => '2024-10-29 19:22:48',
        'description' => 'To discuss solutions on flood control.',
      ],
      [
        'id' => 15,
        'title' => 'Zumba',
        'start' => '2024-10-31 08:00:00',
        'committees' =>
          '["Committee on Barangay Affairs","Committee on Education and Culture","Committee on Energy, Science and Technology","Committee on Environmental Protection","Committee on Finance, Budget and Appropriation","Committee on Labor and Employment","Committee on Peace, Order and Public Safety","Committee on Rules, Ethics, Privileges and Accredetation","Committee on Youth and Sports Development"]',
        'end' => '2024-10-31 21:00:00',
        'created_at' => '2024-10-25 07:31:51',
        'updated_at' => '2024-10-29 19:23:10',
        'description' => 'Zumba',
      ],
      [
        'id' => 17,
        'title' => 'Zumba',
        'start' => '2024-10-31 00:00:00',
        'committees' =>
          '["Committee on Barangay Affairs","Committee on Education and Culture","Committee on Energy, Science and Technology"]',
        'end' => '2024-11-01 00:00:00',
        'created_at' => '2024-10-30 02:51:35',
        'updated_at' => '2024-10-30 02:51:35',
        'description' => 'Zumba',
      ],
    ]);
  }
}
