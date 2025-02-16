<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResolutionsOrdinancesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('resolutions_ordinances')->insert([
      [
        'id' => 24,
        'title' =>
          'RESOLUTION DECLARING SUPPLEMENTAL BUDGET NO. 01 FOR CY 2024 OF BARANGAY MAHAYAG IN THE TOTAL AMOUNT OF ONE HUNDRED FORTY-TWO THOUSAND FIVE HUNDRED SIXTY-FOUR PESOS AND 89/100 [PHP142,564.89] FOR VARIOUS EXPENDITURES OF BARANGAY MAHAYAG, DAGOHOY, BOHOL SUBJECT FOR COMMENTS AND OBSERVATIONS BY THE MUNICIPAL BUDGET OFFICER AS VALID.',
        'sponsored' => 'Hon. Vicente T. Lanoy, Jr.',
        'co_sponsored' => 'Hon. Arnold G. Maghamil',
        'description' => 'Supplemental Budget No. 1 of Mahayag CY 2024',
        'date_published' => '2024-09-30',
        'file_name' => 'Resolution_No_2024_536.pdf.enc',
        'updated_at' => '2024-10-25',
        'created_at' => '2024-10-25',
        'type' => 'resolution',
        'subject_matter' => 'Supplemental Budget No. 1 of Mahayag CY 2024',
        'year_in_series' => 2024,
        'encryption_key' => '4xMuifczeBaOBKqum45kjUvndhiweywq',
      ],
      [
        'id' => 25,
        'title' =>
          'A RESOLUTION AUTHORIZING THE LOCAL CHIEF EXECUTIVE MAYOR GERMINIO C. RELAMPAGOS OF THE LOCAL GOVERNMENT UNIT OF DAGOHOY, BOHOL REFERRED TO AS “PROPONENT CO-PARTNER” TO ENTER AND SIGN INTO A MEMORANDUM OF AGREEMENT [MOA] WITH THE DEPARTMENT OF LABOR AND EMPLOYMENT REGIONAL OFFICE NO. 7 REPRESENTATIVE BY ITS OIC REGIONAL DIRECTOR, LILIA A. ESTILLORE, REFERRED TO AS “DOLE-RO - VI” FOR THE IMPLEMENTATION OF DOLE INTEGRATED LIVELIHOOD PROGRAM [DILP] IN THE MUNICIPALITY OF DAGOHOY, BOHOL.',
        'sponsored' => 'Hon. Arnold G. Maghamil',
        'co_sponsored' => 'N/A',
        'description' => 'DOLE DILP',
        'date_published' => '2024-09-19',
        'file_name' => 'Reso_No_2024_515.pdf.enc',
        'updated_at' => '2024-10-25',
        'created_at' => '2024-10-25',
        'type' => 'resolution',
        'subject_matter' => 'DOLE DILP',
        'year_in_series' => 2024,
        'encryption_key' => 'Br07BJPxDdHRkgh2zWT3v6f9Iuxl1zcx',
      ],
    ]);
  }
}
