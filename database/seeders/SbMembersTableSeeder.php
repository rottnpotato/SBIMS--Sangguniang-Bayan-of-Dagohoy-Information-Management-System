<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SbMembersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    DB::table('sb_members')->insert([
      [
        'id' => 35,
        'first_name' => 'Roel',
        'last_name' => 'Lagroma',
        'position' => 'Vice Mayor',
        'committee' =>
          'Committee on Civil Society Organization, Special Committee on Ehtics and Conduct',
        'termStart' => '2024-07-01',
        'termEnd' => '2025-06-30',
        'biography' =>
          'Hon. Roel "Wing" P. Lagroma currently serves as the Municipal Vice Mayor, a position he was elected to in 2022. With a solid educational foundation, he holds a degree in Architectural Drafting and a Bachelor of Arts in Political Science. His professional journey began as a draftsman, where he honed his skills for several years before transitioning into the political arena in 2010 as a Barangay Councilor.',
        'memberImage' => '1733986362_IMG_1110.jpeg',
        'updated_at' => '2024-12-12',
        'created_at' => '2024-12-12',
      ],
      [
        'id' => 36,
        'first_name' => 'Vicente',
        'last_name' => 'Lanoy Jr',
        'position' => 'Councilor',
        'committee' => 'Committee on Finance, Budget and Appropriation',
        'termStart' => '2024-12-01',
        'termEnd' => '2024-12-04',
        'biography' =>
          "Education:\r\nHon. Vicente \"Enting\" T. Lanoy, Jr. holds a Bachelor of Science in Marine Transportation, equipping him with valuable skills and knowledge for his maritime career.\r\n\r\nProfessional Background:\r\nBefore entering the political arena, Lanoy worked as a seafarer, gaining extensive experience traveling the seas. After several years in the maritime industry, he transitioned to focus on business, leveraging his seafaring insights to engage in entrepreneurial ventures.\r\n\r\nPolitical Career:\r\nLanoy’s passion for his community led him to enter politics, where he was first elected as a municipal councilor. His commitment to public service and community development has made him a respected figure in local governance.\r\n\r\nVision:\r\nHon. Lanoy envisions continuing his service to the people and enhancing the community's welfare. He aims to run for re-election in the upcoming election, focusing on sustainable development and the promotion of local businesses to ensure a prosperous future for his constituents.",
        'memberImage' => '1733986787_IMG_1117.jpeg',
        'updated_at' => '2024-12-12',
        'created_at' => '2024-12-12',
      ],
      [
        'id' => 37,
        'first_name' => 'Ritchel',
        'last_name' => 'Socorin',
        'position' => 'Councilor',
        'committee' => 'Committee on Trade, Labor, Commerce and Industry',
        'termStart' => '2023-07-01',
        'termEnd' => '2024-07-29',
        'biography' =>
          'Hon. Ritchel "Ondoy" C. Socorin currently serves as a committed Municipal Councilor, bringing a wealth of knowledge and experience to his role. He is a Registered Electronics and Communications Engineer, having worked for several years both abroad and in the Philippines before venturing into politics. His professional background has equipped him with valuable skills that he applies to his public service.\r\n\r\nElected in 2022, Councilor Socorin began his political career with a strong desire to make a difference in his community. This significant victory marked the start of his first term, energizing his commitment to serving the people.',
        'memberImage' => '1733987155_IMG_1113.jpeg',
        'updated_at' => '2024-12-12',
        'created_at' => '2024-12-12',
      ],
      [
        'id' => 38,
        'first_name' => 'Ruben',
        'last_name' => 'Logronio',
        'position' => 'Councilor',
        'committee' => 'Committee on Human Ecology and Environmental Protection',
        'termStart' => '2023-06-30',
        'termEnd' => '2025-07-31',
        'biography' =>
          'Hon. Ruben L. Logroño has been elected as a municipal councilor for his first term. Prior to entering politics, he worked for several years as an election officer in town until his retirement. As a Law graduate, he is well-equipped with the knowledge needed for his duties and responsibilities, despite being a first-time legislator. He has been an active member of Youth for Christ for years, which is why he is dedicated to serving all his constituents, regardless of their status.',
        'memberImage' => '1733987243_IMG_1114.jpeg',
        'updated_at' => '2024-12-12',
        'created_at' => '2024-12-12',
      ],
      [
        'id' => 39,
        'first_name' => 'Jemilo',
        'last_name' => 'Puertos',
        'position' => 'Representative, LnB President',
        'committee' => 'Committee on Barangay Affairs',
        'termStart' => '2023-07-01',
        'termEnd' => '2025-07-30',
        'biography' =>
          'Hon. Jemilo "Jimmy" Puertos is a dedicated Municipal Councilor known for his unwavering commitment to serving his community. Balancing his political responsibilities with managing his family business, Jimmy has demonstrated a unique ability to connect with the needs of his constituents while ensuring their interests are represented.',
        'memberImage' => '1733987321_IMG_1115.jpeg',
        'updated_at' => '2024-12-12',
        'created_at' => '2024-12-12',
      ],
      [
        'id' => 40,
        'first_name' => 'Andres',
        'last_name' => 'Ampoloquio',
        'position' => 'Councilor',
        'committee' => 'Committee on Ways and Means',
        'termStart' => '2023-07-01',
        'termEnd' => '2025-06-30',
        'biography' =>
          'Hon. Andres D. Ampoloquio is a seasoned Municipal Councilor and respected businessman, known for his extensive contributions to local governance and community development. His political career spans several terms as a municipal councilor and includes a significant tenure as the municipal vice mayor, earning him recognition as a giant in the political landscape of his municipality. Throughout his years of service, he has demonstrated a steadfast commitment to the welfare of his constituents. Driven by a passion for genuine service, Councilor Ampoloquio aspires to continue his work for the betterment of his community, seeking re-election in the upcoming elections to further his mission of support and progress for the people he serves.',
        'memberImage' => '1733987464_IMG_1108.jpeg',
        'updated_at' => '2024-12-12',
        'created_at' => '2024-12-12',
      ],
      [
        'id' => 41,
        'first_name' => 'Arnold',
        'last_name' => 'Maghamil',
        'position' => 'Councilor',
        'committee' => 'Committee on Personnel Management',
        'termStart' => '2023-07-01',
        'termEnd' => '2025-07-01',
        'biography' =>
          'Hon. Arnold "Anod" G. Maghamil is a committed Municipal Councilor known for his deep-rooted passion for public service. He began his political journey as an elected barangay councilor, where he discovered his calling to serve the community. This experience motivated him to advance to the municipal level, where he has successfully served multiple terms as councilor.',
        'memberImage' => '1733987563_IMG_1109.jpeg',
        'updated_at' => '2024-12-12',
        'created_at' => '2024-12-12',
      ],
      [
        'id' => 42,
        'first_name' => 'Lloyd',
        'last_name' => 'Evardo',
        'position' => 'Councilor',
        'committee' => 'Committee on Infra-structure, Eco-tourism',
        'termStart' => '2023-07-01',
        'termEnd' => '2025-06-30',
        'biography' =>
          'Hon. Lloyd L. Evardo is a dedicated Municipal Councilor known for his commitment to genuine public service. Before entering the political arena, he spent several years as an overseas Filipino worker, gaining invaluable experience and insights into the needs and aspirations of his fellow countrymen. This term marks his first foray into politics, where he has quickly established himself as a passionate advocate for his community. Driven by a strong desire to serve, Councilor Evardo envisions continuing his mission of support and development for his constituents. He aims to secure re-election in the upcoming elections, ensuring that he can further contribute to the betterment of his community and its people.',
        'memberImage' => '1733987630_IMG_1112.jpeg',
        'updated_at' => '2024-12-12',
        'created_at' => '2024-12-12',
      ],
      [
        'id' => 43,
        'first_name' => 'Niño Cesar',
        'last_name' => 'Lagapa',
        'position' => 'Councilor',
        'committee' => 'Committee on Health and Public Sanitation',
        'termStart' => '2023-07-01',
        'termEnd' => '2025-07-01',
        'biography' =>
          'Hon. Niño Cesar "Niño" J. Lagapa is a dedicated Municipal Councilor known for his commitment to public service and community development. A graduate in Bachelor of Science in Marine Transportation, Niño began his political journey as a Barangay Councilor, where he gained valuable experience and insight into local governance.',
        'memberImage' => '1733987734_IMG_1105.jpeg',
        'updated_at' => '2024-12-12',
        'created_at' => '2024-12-12',
      ],
      [
        'id' => 44,
        'first_name' => 'Fritcel Angeli',
        'last_name' => 'Frajele',
        'position' => 'Councilor',
        'committee' => 'Committee on Womens and Family Relations',
        'termStart' => '2023-07-01',
        'termEnd' => '2025-06-30',
        'biography' =>
          'Hon. Fritcel Angeli A. Frajele, a dedicated Municipal Councilor, is a Registered Pharmacist with a passion for public service. Initially hesitant to enter politics due to her youth and inexperience, she embraced the opportunity and won the trust of her constituents in 2022. Since taking office, she has demonstrated determination and capability, proving her commitment to her responsibilities and the welfare of her community.',
        'memberImage' => '1733987819_IMG_1107.jpeg',
        'updated_at' => '2024-12-12',
        'created_at' => '2024-12-12',
      ],
      [
        'id' => 45,
        'first_name' => 'Stephen',
        'last_name' => 'Planos',
        'position' => 'Representative, PPSK President',
        'committee' => 'Committee on Youth and Sports',
        'termStart' => '2023-07-01',
        'termEnd' => '2025-06-30',
        'biography' =>
          'Hon. Stephen "Tepen" Planos has been elected as the Representative/President of the Sangguniang Kabataan. As a young legislator, Tepen offers full cooperation in the council despite his inexperience in politics. He is navigating the challenges of joining politics and embracing his duties and responsibilities, all while managing a busy student life.',
        'memberImage' => '1733987990_Screenshot 2024-12-12 151913.png',
        'updated_at' => '2024-12-12',
        'created_at' => '2024-12-12',
      ],
    ]);
  }
}
