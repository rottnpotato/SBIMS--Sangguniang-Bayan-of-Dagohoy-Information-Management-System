<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $this->call([
      AccountsTableSeeder::class,
      AdminTableSeeder::class,
      BlottersTableSeeder::class,
      CertificatesTableSeeder::class,
      NewsTableSeeder::class,
      OtherDocumentsTableSeeder::class,
      ResolutionsOrdinancesTableSeeder::class,
      SbMembersTableSeeder::class,
      ScheduleTableSeeder::class,
      SessionsTableSeeder::class,
    ]);
  }
}
