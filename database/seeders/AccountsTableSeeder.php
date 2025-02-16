<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('accounts')->insert([
      [
        'account_id' => 1,
        'first_name' => 'admin',
        'last_name' => 'evangelista',
        'email' => 'admin',
        'password' =>
          '$2y$10$lCW/3UzZGOGZjQGgQdLeHuHHsJkIQvlxpCU3AEV4XN5ZltP85fZ4e',
        'type' => 'Admin',
        'status' => 'approve',
        'remember_token' => null,
        'created_at' => null,
        'updated_at' => '2025-01-07 21:32:37',
      ],
      [
        'account_id' => 2,
        'first_name' => 'Secretary',
        'last_name' => 'Secretary',
        'email' => 'encoder@gmail.com',
        'password' =>
          '$2y$10$xuUoQva.m4hY.I1GWV/SqeIcwjbl0rvfIXoHs//FN1oVds2Bj/i7u',
        'type' => 'Secretary',
        'status' => 'approve',
        'remember_token' => null,
        'created_at' => null,
        'updated_at' => '2024-10-14 07:56:09',
      ],
      [
        'account_id' => 3,
        'first_name' => 'Tedoro',
        'last_name' => 'Tampolano',
        'email' => 'sbmember@gmail.com',
        'password' =>
          '$2y$10$juW00IPUxGa.0UbhbCl0Q.C3UeUSG4MGmbNee0yS8U/D2fQC5VZGS',
        'type' => 'SBMember',
        'status' => 'active',
        'remember_token' => null,
        'created_at' => null,
        'updated_at' => null,
      ],
      [
        'account_id' => 11,
        'first_name' => 'Secretary',
        'last_name' => 'Secretary',
        'email' => 'Secretary',
        'password' =>
          '$2y$10$x2TzWisdFQPfdr/Y5MNUxOoVs0dXLQY7m6g5FP2dHdcBNT7LmXaLm',
        'type' => 'Secretary',
        'status' => 'active',
        'remember_token' => null,
        'created_at' => null,
        'updated_at' => null,
      ],
      [
        'account_id' => 12,
        'first_name' => 'Vicente',
        'last_name' => 'Lanoy Jr',
        'email' => 'sbmember',
        'password' =>
          '$2y$10$hvC.9.2.5og63R7q.x9c/ukB0kprSuuFOrIWLAGuqJ399u8sIoyvC',
        'type' => 'SBMember',
        'status' => 'active',
        'remember_token' => null,
        'created_at' => null,
        'updated_at' => null,
      ],
    ]);
  }
}
