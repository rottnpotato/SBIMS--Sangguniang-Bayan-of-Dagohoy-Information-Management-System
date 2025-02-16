<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OtherDocumentsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('other_documents')->insert([
      [
        'id' => 2,
        'uploaded_by' => 1,
        'title' => 'file',
        'description' => 'files',
        'file_path' => '1733980502_iuyiuy.txt',
        'created_at' => '2024-12-12 05:15:02',
        'updated_at' => '2024-12-12 05:15:02',
      ],
      [
        'id' => 3,
        'uploaded_by' => 12,
        'title' => 'Emails',
        'description' => 'Emails records',
        'file_path' => '1736309805_BISU EMAIL.txt',
        'created_at' => '2025-01-08 04:16:45',
        'updated_at' => '2025-01-08 04:16:45',
      ],
    ]);
  }
}
