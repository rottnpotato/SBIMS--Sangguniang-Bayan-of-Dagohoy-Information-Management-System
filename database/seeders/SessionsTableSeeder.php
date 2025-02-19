<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SessionsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('sessions')->insert([
      [
        'session_id' => 132,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2024-12-12 05:57:01',
        'logged_out_at' => '2024-12-11 21:57:01',
      ],
      [
        'session_id' => 133,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2024-12-12 09:53:22',
        'logged_out_at' => '2024-12-12 01:53:22',
      ],
      [
        'session_id' => 134,
        'user_type' => 'Secretary',
        'user_id' => 11,
        'email' => 'secretary',
        'login_at' => '2024-12-12 09:56:52',
        'logged_out_at' => '2024-12-12 01:56:52',
      ],
      [
        'session_id' => 135,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2024-12-12 01:56:58',
        'logged_out_at' => null,
      ],
      [
        'session_id' => 136,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2024-12-12 18:20:26',
        'logged_out_at' => null,
      ],
      [
        'session_id' => 137,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2024-12-12 18:21:02',
        'logged_out_at' => null,
      ],
      [
        'session_id' => 138,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2024-12-12 18:26:33',
        'logged_out_at' => null,
      ],
      [
        'session_id' => 139,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2024-12-12 18:39:38',
        'logged_out_at' => null,
      ],
      [
        'session_id' => 140,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2024-12-13 01:07:24',
        'logged_out_at' => null,
      ],
      [
        'session_id' => 141,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2025-01-04 19:24:33',
        'logged_out_at' => null,
      ],
      [
        'session_id' => 142,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2025-01-05 16:19:16',
        'logged_out_at' => '2025-01-05 08:19:16',
      ],
      [
        'session_id' => 143,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2025-01-05 08:19:20',
        'logged_out_at' => null,
      ],
      [
        'session_id' => 144,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2025-01-05 16:20:28',
        'logged_out_at' => null,
      ],
      [
        'session_id' => 145,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2025-01-06 00:22:09',
        'logged_out_at' => null,
      ],
      [
        'session_id' => 146,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2025-01-07 15:20:00',
        'logged_out_at' => '2025-01-07 07:20:00',
      ],
      [
        'session_id' => 147,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2025-01-07 07:21:51',
        'logged_out_at' => null,
      ],
      [
        'session_id' => 148,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2025-01-07 22:25:10',
        'logged_out_at' => '2025-01-07 14:25:10',
      ],
      [
        'session_id' => 149,
        'user_type' => 'Secretary',
        'user_id' => 11,
        'email' => 'secretary',
        'login_at' => '2025-01-07 22:25:56',
        'logged_out_at' => '2025-01-07 14:25:56',
      ],
      [
        'session_id' => 150,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2025-01-07 14:26:11',
        'logged_out_at' => null,
      ],
      [
        'session_id' => 151,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2025-01-08 04:12:56',
        'logged_out_at' => '2025-01-07 20:12:56',
      ],
      [
        'session_id' => 152,
        'user_type' => 'SBMember',
        'user_id' => 12,
        'email' => 'sbmember',
        'login_at' => '2025-01-08 04:29:29',
        'logged_out_at' => '2025-01-07 20:29:29',
      ],
      [
        'session_id' => 153,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2025-01-08 04:45:12',
        'logged_out_at' => '2025-01-07 20:45:12',
      ],
      [
        'session_id' => 154,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2025-01-08 05:32:46',
        'logged_out_at' => '2025-01-07 21:32:46',
      ],
      [
        'session_id' => 155,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2025-01-07 21:32:54',
        'logged_out_at' => null,
      ],
      [
        'session_id' => 156,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2025-01-17 23:28:51',
        'logged_out_at' => null,
      ],
      [
        'session_id' => 157,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2025-02-09 20:42:22',
        'logged_out_at' => null,
      ],
      [
        'session_id' => 158,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2025-02-15 07:58:56',
        'logged_out_at' => null,
      ],
      [
        'session_id' => 159,
        'user_type' => 'Admin',
        'user_id' => 1,
        'email' => 'admin',
        'login_at' => '2025-02-15 08:20:21',
        'logged_out_at' => null,
      ],
    ]);
  }
}
