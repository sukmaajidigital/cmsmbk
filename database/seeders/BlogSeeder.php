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
        for ($i = 1; $i <= 10; $i++) {
            $title = 'Beragam Cerita Menarik Motif Batik Kudus ' . $i;
            $slug = Str::slug($title) . '-' . $i;

            Blog::create([
                'title' => $title,
                'slug' => $slug,
                'excerpt' => 'Batik, Kain khas dengan berbagai corak tersebut terkenal sebagai kain khas budaya bangsa Indonesia. Batik merupakan kerajinan yang telah ada sejak zaman Kerajaan Sriwijaya dan Majapahit pada abad ke-7 sampai 14. Pesona dari motif, dan kerumitan tekniknya menjadi daya tarik hingga saat ini sebagai warisan budaya Indonesia yang mendunia, tak terkecuali Batik Kudus. Batik Kudus berasal dari sebuah kampung di Kudus Kulon, yaitu Kampung Langgar Dalem.-' . $i . '.',
                'content' => '<p style="text-align: justify;">

<span style=" font-family: Cabin; font-size: 16px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Batik, Kain khas dengan berbagai corak tersebut terkenal sebagai kain khas budaya bangsa Indonesia. Batik merupakan kerajinan yang telah ada sejak zaman Kerajaan Sriwijaya dan Majapahit pada abad ke-7 sampai 14. Pesona dari motif, dan kerumitan tekniknya menjadi daya tarik hingga saat ini sebagai warisan budaya Indonesia yang mendunia, tak terkecuali<span>&nbsp;</span></span><a href="http://batikkudus.com/" style=" background-color: transparent; text-decoration-line: none; color: rgb(6, 5, 5); font-family: Cabin; font-size: 16px">Batik Kudus</a><span style=" font-family: Cabin; font-size: 16px">.<span>&nbsp;</span></span><span style=" font-family: Cabin; font-size: 16px">Batik Kudus berasal dari sebuah kampung di Kudus Kulon, yaitu Kampung Langgar Dalem. Kampung tersebut dihuni oleh sebagian besar anak dan kerabat dari Sunan Kudus.</span></p>






<div class="baca-juga" data-cache-key="liputan6.com:bump:TextTypeArticle#2349883::isNotMobile::ac5de150fe47600ff205ae2153e02b79" data-cache-ttl="2880" data-component-name="desktop:read-page:article-content-body:section:bacajuga" style="text-align: justify; font-family: Cabin; font-size: 16px;"><br /></div>






<span style=" font-family: Cabin; font-size: 16px"><div style="text-align: justify;">Untuk memenuhi kebutuhan hidup, para wanita di desa tersebut biasa menenun dan juga membatik di mana proses akhir dilakukan di Sungai Gelis di timur Kampung Langgar Dalem. Dilansir dari buku "Batik Kudus, The Heritage," karya Miranti Serad Ginanjar pada Senin (26/10) keindahan batik yang lahir dari tangan telaten wanita Kampung Langgar Dalem ternyata mampu menarik beberapa saudagar dari Arab. Para saudagar yang mayoritas pedangan dan pengusaha Muslim tersebut menjadikan Batik Kudus sebagai komoditi yang diperdagangkan. Sejak saat itu mulai berkembang motif kaligrafi yang kental akan sentuhan Islam yang menghiasi beberapa model Batik Kudus.&nbsp;Selain kaligrafi, motif Batik Kudus yang juga dikenal luas dan melegenda, yaitu lar (sayap) dengan isen-isen (isian) beras kecer (beras tercecer). Selain Arab, Batik Kudus yang didominasi oleh warna biru indigo dan coklat soga ini ternyata juga dipengaruhi oleh budaya Belanda. Hal tersebut ditunjukkan dengan motif-motif tidak lazim yang muncul pada periode 1840-1920-an seperti flora dan fauna dari benua Eropa, serta ornamen yang terdapat dalam dongeng sastra Belanda</div></span>








<br />






<br />






<div style="text-align: center;"><br /><img style="max-width: 80%; height: 277px;" src="/storage/images/QLBPcJnC5t9vVlnM1z9aoQ8R5Ra67mW3XXniIAoG.jpg" /></div>








<p><br /></p>








<p>

</p>






<div class="entry-content" style="text-align: justify; counter-reset: footnotes 0; font-family: Cabin; font-size: 16px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Uniknya, motif-motif Batik Kudus dengan latar budaya Belanda tersebut lahir dari tangan wanita asli dari Belanda sendiri, seperti Carolina Josephina con Franquemont, Chaterina Carikiba van Oosterom, Eliza van Zuylen, B. Fisher, Lien Metzelaar, dan Wiler. Banyaknya budaya yang mempengaruhi Batik Kudus, mulai dari Jawa, Arab, Tionghoa, dan Belanda, membuat batik ini memiliki motif yang kaya. Kudus yang terkenal dengan industri kretek, menjadikan Batik Kudus sebagai media promosi industri tersebut sehingga terciptalah kolaborasi yang indah. Kolaborasi tersebut diwujudkan dalam produk Batik Kudus yang memiliki motif rokok, termasuk alat pembuat kretek, logo perusahaan, sampai seragam pegawainya.</div>
<p style="text-align: justify; counter-reset: footnotes 0; font-family: Cabin; font-size: 16px;"><br /></p>
<p style="text-align: justify; counter-reset: footnotes 0; font-family: Cabin; font-size: 16px;"><br /></p>
<div style="text-align: center;"><img style="max-width: 80%; height: 275px;" src="/storage/images/r9L6TN0DAqibyo2CNSNkTcWkLF7UHtBDhV7F9kiZ.png" /></div>
<p><br /></p>
<div style="text-align: center;"><img style="max-width: 80%; height: 301px;" src="/storage/images/h9ukIxygYNTNg044gVjon7ADSCEWVTGmO5mbHaBn.png" /></div>' . $i . '.</p>',

                // SEO Fields
                'meta_title' => 'Beragam Cerita Menarik Motif Batik Kudus ' . $i,
                'meta_description' => 'Batik, Kain khas dengan berbagai corak tersebut terkenal sebagai kain khas budaya bangsa Indonesia. Batik merupakan kerajinan yang telah ada sejak zaman Kerajaan Sriwijaya dan Majapahit pada abad ke-7 sampai 14. Pesona dari motif, dan kerumitan tekniknya menjadi daya tarik hingga saat ini sebagai warisan budaya Indonesia yang mendunia, tak terkecuali Batik Kudus. Batik Kudus berasal dari sebuah kampung di Kudus Kulon, yaitu Kampung Langgar Dalem.' . $i,
                'meta_keywords' => 'batik, batikkudus, batik kudus, kudus',
                'canonical_url' => 'https://muriabatik.com.muriabatikkudus.com/blog/' . $slug,
                'og_title' => 'Beragam Cerita Menarik Motif Batik Kudus ' . $i,
                'og_description' => 'Batik, Kain khas dengan berbagai corak tersebut terkenal sebagai kain khas budaya bangsa Indonesia. Batik merupakan kerajinan yang telah ada sejak zaman Kerajaan Sriwijaya dan Majapahit pada abad ke-7 sampai 14. Pesona dari motif, dan kerumitan tekniknya menjadi daya tarik hingga saat ini sebagai warisan budaya Indonesia yang mendunia, tak terkecuali Batik Kudus. Batik Kudus berasal dari sebuah kampung di Kudus Kulon, yaitu Kampung Langgar Dalem' . $i,
                'og_image' => 'blog_images/MfIVYVt7UCkCWUfce4ImMAZvxdp1NFOsxRwIbcM2.jpg',

                // Image
                'featured_image' => 'blog_images/MfIVYVt7UCkCWUfce4ImMAZvxdp1NFOsxRwIbcM2.jpg',
                'featured_image_alt' => $slug . $i,

                // Additional
                'user_id' => 1, // pastikan user_id 1 ada, atau sesuaikan
                'is_published' => $i % 2 == 0, // genap published, ganjil draft
                'published_at' => $i % 2 == 0 ? now()->subDays($i) : null,
            ]);
        }
    }
}
