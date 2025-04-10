<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Landing extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // main data
        DB::table('landing_main')->insert([
            'shortname' => 'MBK',
            'longname' => 'Muria Batik Kudus',
            'logo' => 'logo/logo.png',
            'icon' => 'icons/icon.png',
            'data_theme' => 'gourmet',
        ]);
        // data kontak
        DB::table('landing_contact')->insert([
            'telepon' => '+62 811-2828-188',
            'alamat' => 'desa karangmalang rt 004 rw 002, kecamatan gebog, kabupaten kudus, provinsi jawa tengah',
            'email' => 'mbatikkudus@gmail.com',
            'maps' => '@-6.7721234,110.8339916,374m',
        ]);
        // data about
        DB::table('landing_about')->insert([
            'deskripsi' => "Pada tahun 1900an batik kudus mengalami kejayaan namun pada akhirnya mulai dilupakan dan, pada tahun 2005, Yuli Arstuti sebagai pemilik Muria Batik Kudus, mulai melakukan penelitian dan upaya pelestarian terhadap motif-motif khas Kudus. Melalui dedikasinya, motif motif khas Kudus berhasil bangkit kembali dan mendapatkan apresiasi yang lebih luas. Yuli Astuti tidak hanya menciptakan kembali motif-motif yang hampir punah, tetapi juga menggabungkannya dengan desain modern, sehingga hasil dari motif motifnya menjadi lebih relevan dan diminati oleh generasi muda.

            Batik Kudus merupakan salah satu jenis batik pesisir yang memiliki komposisi warna-warna yang terinspirasi oleh kehidupan di daerah pesisir. Warna-warna yang dominan adalah biru laut, hijau daun, cokelat pasir, dan nuansa warna-warna alam lainnya. Komposisi warna-warna pesisir ini memberikan kesan segar dan menenangkan pada batik Kudus.

            adalah satu ciri khas dari kain ini adalah keberagaman motif yang ada. Beberapa motif terkenal yang menjadi identitas tersendiri antara lain motif Parijhoto, motif Kapal Kandas, motif Cengkeh, motif Tembakau, motif Tari Kretek,motih air tiga rasa dan masih banyak lagi. Setiap motif tersebut memiliki cerita dan makna tersendiri, yang sering kali menggambarkan kehidupan masyarakat, alam sekitar, atau tradisi lokal yang khas.

            Keberhasilan Yuli Arstuti dalam menghidupkan kembali batik Kudus menjadi sebuah inspirasi bagi para perajin dan pecinta batik di Kudus. Upaya pelestarian dan pengembangan motif-motif batik Kudus terus dilakukan agar warisan budaya ini dapat tetap dikenal dan diapresiasi oleh generasi mendatang. yang menjadikannya sebagai salah satu kekayaan budaya Indonesia, dapat terus berkembang dan menjadi sumber kebanggaan bagi masyarakat Kudus dan Indonesia secara keseluruhan.",
            'imageabout' => 'imageabout/imageabout.jpg',
        ]);
        // data view controller
        DB::table('landing_controllview')->insert([
            'hero_tagline' => 'The Haritage of Kudus Java',
            'hero_subtagline' => 'pusat batik asli khas kudus',
            'hero_button' => 'Jelajahi Sekarang',
            'hero_image' => 'hero_image/heroimage.jpg',
            'proses_title' => 'Proses Batik',
            'proses_subtitle' => 'Dibuat dengan bahan premium dan sentuhan seni terbaik dari pengrajin Indonesia',
            'produk_title' => 'Produk',
            'produk_subtitle' => 'Koleksi Produk Batik Terbaru kami',
        ]);

        DB::table('landing_proses')->insert([
            [
                'judul' => 'Njaplak',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat quod corporis consequuntur, quia eos dolore qui recusandae deserunt facere fuga officiis, nulla nobis sint voluptatem suscipit tenetur dolor est quae?',
                'imageproses' => 'imageproses/1.png',
            ],
            [
                'judul' => 'Ngecap',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat quod corporis consequuntur, quia eos dolore qui recusandae deserunt facere fuga officiis, nulla nobis sint voluptatem suscipit tenetur dolor est quae?',
                'imageproses' => 'imageproses/2.png',
            ],
            [
                'judul' => 'Nyanting',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat quod corporis consequuntur, quia eos dolore qui recusandae deserunt facere fuga officiis, nulla nobis sint voluptatem suscipit tenetur dolor est quae?',
                'imageproses' => 'imageproses/4.png',
            ],
            [
                'judul' => 'Nyolet',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat quod corporis consequuntur, quia eos dolore qui recusandae deserunt facere fuga officiis, nulla nobis sint voluptatem suscipit tenetur dolor est quae?',
                'imageproses' => 'imageproses/5.png',
            ],
            [
                'judul' => 'Nembok',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat quod corporis consequuntur, quia eos dolore qui recusandae deserunt facere fuga officiis, nulla nobis sint voluptatem suscipit tenetur dolor est quae?',
                'imageproses' => 'imageproses/6.png',
            ],
            [
                'judul' => 'Ngewarna',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat quod corporis consequuntur, quia eos dolore qui recusandae deserunt facere fuga officiis, nulla nobis sint voluptatem suscipit tenetur dolor est quae?',
                'imageproses' => 'imageproses/7.png',
            ],
            [
                'judul' => 'Ngelorod',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat quod corporis consequuntur, quia eos dolore qui recusandae deserunt facere fuga officiis, nulla nobis sint voluptatem suscipit tenetur dolor est quae?',
                'imageproses' => 'imageproses/8.png',
            ],
            [
                'judul' => 'Jemur',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat quod corporis consequuntur, quia eos dolore qui recusandae deserunt facere fuga officiis, nulla nobis sint voluptatem suscipit tenetur dolor est quae?',
                'imageproses' => 'imageproses/9.png',
            ],
        ]);

        DB::table('landing_vidio')->insert([
            [
                'judul' => 'Batik Kudus',
                'deskripsi' => 'Batik Kudus adalah salah satu jenis batik yang berasal dari Kudus, Jawa Tengah. Batik ini dibuat dengan menggunakan bahan-bahan yang berkualitas tinggi dan memiliki motif yang unik dan menarik.',
                'vidio' => 'vidio/proses.mp4',
            ],
        ]);
    }
}
