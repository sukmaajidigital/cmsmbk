<?php

namespace Database\Seeders;

use App\Models\postingan\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Blog::create([
            'title' => 'Proses Membatik Batik Kudus',
            'slug' => 'proses-membatik',
            'excerpt' => 'Batik, Kain khas dengan berbagai corak tersebut terkenal sebagai kain khas budaya bangsa Indonesia. Batik merupakan kerajinan yang telah ada sejak zaman Kerajaan Sriwijaya dan Majapahit pada abad ke-7 sampai 14. Pesona dari motif, dan kerumitan tekniknya menjadi daya tarik hingga saat ini sebagai warisan budaya Indonesia yang mendunia, tak terkecuali Batik Kudus. Batik Kudus berasal dari sebuah kampung di Kudus Kulon, yaitu Kampung Langgar Dalem.',
            'content' => '',

            // SEO Fields
            'meta_title' => 'Beragam Cerita Menarik Motif Batik Kudus ',
            'meta_description' => 'Batik, Kain khas dengan berbagai corak tersebut terkenal sebagai kain khas budaya bangsa Indonesia. Batik merupakan kerajinan yang telah ada sejak zaman Kerajaan Sriwijaya dan Majapahit pada abad ke-7 sampai 14. Pesona dari motif, dan kerumitan tekniknya menjadi daya tarik hingga saat ini sebagai warisan budaya Indonesia yang mendunia, tak terkecuali Batik Kudus. Batik Kudus berasal dari sebuah kampung di Kudus Kulon, yaitu Kampung Langgar Dalem.',

            'meta_keywords' => 'batik, batikkudus, batik kudus, kudus',

            'canonical_url' => 'https://muriabatik.com.muriabatikkudus.com/blog/proses-membatik',

            'og_title' => 'Beragam Cerita Menarik Motif Batik Kudus ',

            'og_description' => 'Batik, Kain khas dengan berbagai corak tersebut terkenal sebagai kain khas budaya bangsa Indonesia. Batik merupakan kerajinan yang telah ada sejak zaman Kerajaan Sriwijaya dan Majapahit pada abad ke-7 sampai 14. Pesona dari motif, dan kerumitan tekniknya menjadi daya tarik hingga saat ini sebagai warisan budaya Indonesia yang mendunia, tak terkecuali Batik Kudus. Batik Kudus berasal dari sebuah kampung di Kudus Kulon, yaitu Kampung Langgar Dalem',
            'og_image' => 'blog_images/MfIVYVt7UCkCWUfce4ImMAZvxdp1NFOsxRwIbcM2.jpg',

            // Image
            'featured_image' => 'blog_images/MfIVYVt7UCkCWUfce4ImMAZvxdp1NFOsxRwIbcM2.jpg',
            'featured_image_alt' => 'proses-membatik',

            // Additional
            'user_id' => 1, // pastikan user_id 1 ada, atau sesuaikan
            'is_published' => 2,
            'published_at' => now()->format('Y-m-d H:i:s'),
        ]);
    }
}
