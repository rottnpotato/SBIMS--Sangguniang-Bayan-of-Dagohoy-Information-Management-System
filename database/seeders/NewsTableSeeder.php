<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('news')->insert([
      [
        'id' => 8,
        'title' =>
          'Santo Tomas Municipality Showcases Best Practices in Solid Waste Management',
        'content' =>
          'Benchmarking Activity for Best Practices in Solid Waste Management took place at the Municipality of Santo Tomas, Davao del Norte. The second day of benchmarking is scheduled to include a visit to the Santo Tomas Ecological Solid Waste Management (ESWM). We were graciously hosted by Mayor Roland S. Dejesica, Municipal Administrator Ana Jane Gatillio, and MENRO Head Charlemagne Fernandez.',
        'full_content' =>
          "September 18-20, 2024 - The Municipality of Santo Tomas, Davao del Norte opened its doors for a comprehensive benchmarking activity focused on best practices in solid waste management. The three-day event highlighted the local government's commitment to environmental sustainability and proper waste management systems.\r\n\r\nA key highlight of the benchmarking activity was the scheduled visit to the Santo Tomas Ecological Solid Waste Management (ESWM) facility on the second day. This visit provided participants with firsthand experience of the municipality's waste management infrastructure and operational procedures.\r\n\r\nThe delegation was warmly received by Santo Tomas Mayor Roland S. Dejesica, along with Municipal Administrator Ana Jane Gatillio and MENRO Head Charlemagne Fernandez. Their presence underscored the local government's strong support for environmental initiatives and commitment to sharing their successful practices with other municipalities.\r\n\r\nThe benchmarking activity serves as a platform for knowledge exchange and aims to promote effective solid waste management strategies that other local government units can potentially adopt and implement in their respective areas.",
        'image' => 'news1.jpg',
        'created_at' => '2024-10-29 07:58:01',
        'updated_at' => '2024-10-29 07:58:01',
      ],
      [
        'id' => 9,
        'title' =>
          'Dagohoy Council Holds Discussion on Cemetery Charges Under Revenue Code',
        'content' =>
          'Members of the SB invited guests from various departments to discuss Municipal Ordinance No. 013, series of 2020, titled "Revenue Code of the Municipality of Dagohoy." They addressed issues related to cemetery charges, which were raised by Hon. Jezryl Timon, Brgy. Kagawad of Caluasan, and Mrs. Rosalina M. Andrade.\r\nThis matter was effectively addressed by Mrs. Carmelita O. Salingay, representative of the Municipal Treasurer; Mr. Mario Avergonzado, Motorpool/DAGWAS OIC, representing the non-Catholic sector; and Mr. Michael Literatos, who is responsible for specific operations of the old cemetery.',
        'full_content' =>
          "# Dagohoy Council Holds Discussion on Cemetery Charges Under Revenue Code\r\n\r\nIn a significant meeting of the Sangguniang Bayan held on September 16, 2024, local officials and department representatives convened to address concerns regarding cemetery charges outlined in Municipal Ordinance No. 013, series of 2020, known as the \"Revenue Code of the Municipality of Dagohoy.\"\r\n\r\nThe session, which focused on cemetery management and associated fees, was prompted by concerns raised by Honorable Jezryl Timon, Barangay Kagawad of Caluasan, and Mrs. Rosalina M. Andrade. Their questions sparked a comprehensive discussion about the implementation of cemetery-related provisions within the municipal revenue code.\r\n\r\nMrs. Carmelita O. Salingay, representing the Municipal Treasurer's Office, provided clarification on the financial aspects of the ordinance. The discussion was further enriched by insights from Mr. Mario Avergonzado, who serves as the Motorpool/DAGWAS OIC and represented the non-Catholic sector's interests in the matter. Mr. Michael Literatos, who oversees operations at the old cemetery, also contributed valuable operational perspectives to the dialogue.\r\n\r\nThe meeting demonstrated the local government's commitment to addressing community concerns through inclusive dialogue and collaborative problem-solving. The discussion aimed to ensure fair and equitable implementation of cemetery charges while considering the diverse needs of Dagohoy's residents.\r\n\r\nThe regular session of the Sangguniang Bayan continues to serve as a vital forum for addressing municipal concerns and refining local legislation to better serve the community's needs.",
        'image' => 'news2.jpg',
        'created_at' => '2024-10-29 08:00:46',
        'updated_at' => '2024-10-29 08:00:46',
      ],
      [
        'id' => 10,
        'title' =>
          'Dagohoy Council Continues Tourism Code Deliberations, Tackles Boundary Issues with Pilar',
        'content' =>
          'The Committee Hearing as a Whole was held for the proposed ordinance titled "ORDINANCE ESTABLISHING THE TOURISM CODE OF THE MUNICIPALITY OF DAGOHOY AND PRESCRIBING PENALTIES FOR VIOLATIONS THEREOF." Mr. Artemio Lagapa, the executive secretary, and Ms. Jennifer Degamo, mayor\'s office staff, attended the hearing. This is the 8th time the hearing has taken place since the first one on November 30, 2023. So far, they have completed four chapters out of thirteen. The discussion is still ongoing.\r\nOn the other hand, Mrs. Ma. Jocelyn Gambuta, the Pilar SB Secretary, attended the same day to discuss matters concerning the political boundary dispute between the municipalities of Pilar and Dagohoy. Both local government units (LGUs) discussed a better plan to address the recommendations of the DENR and come up with possible resolutions.',
        'full_content' =>
          "The Sangguniang Bayan of Dagohoy conducted a Committee Hearing as a Whole on July 17, 2024, addressing two significant matters: the ongoing development of the municipal tourism code and a territorial boundary dispute with the neighboring municipality of Pilar.\r\nTourism Code Development\r\nIn what marked the eighth session since its initial hearing on November 30, 2023, the council continued its deliberations on the proposed ordinance \"Establishing the Tourism Code of the Municipality of Dagohoy and Prescribing Penalties for Violations Thereof.\" The hearing was attended by Executive Secretary Mr. Artemio Lagapa and Mayor's Office staff member Ms. Jennifer Degamo.\r\nThe council has made steady progress, having completed four out of thirteen chapters of the comprehensive tourism code. This methodical approach reflects the council's commitment to creating a thorough and well-considered framework for local tourism development.\r\nBoundary Dispute Resolution\r\nIn a separate but equally significant development during the same session, Mrs. Ma. Jocelyn Gambuta, SB Secretary of Pilar, joined the proceedings to address the ongoing political boundary dispute between the municipalities of Pilar and Dagohoy.\r\nRepresentatives from both local government units engaged in constructive discussions, focusing on developing an effective response to recommendations provided by the Department of Environment and Natural Resources (DENR). The meeting aimed to identify potential resolutions to the boundary issue, with both municipalities showing commitment to finding a mutually beneficial solution.\r\nThe dual focus of the session demonstrates the council's active engagement in both developmental planning and territorial administration, as they work to advance both the municipality's tourism potential and resolve long-standing boundary issues.",
        'image' => 'news3.jpg',
        'created_at' => '2024-10-29 08:03:07',
        'updated_at' => '2024-10-29 08:03:07',
      ],
    ]);
  }
}
