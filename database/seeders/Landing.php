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
        DB::table('landing_main')->insert([
            'shortname' => 'MBK',
            'longname' => 'Muria Batik Kudus',
            'logo' => 'logo/PJUMXQbq5l5EQ5GImO6Ikg8HYXxv4JYwtB1CL2ov.png',
            'icon' => 'icons/tIqInRVDpeW8ROs5TRSQZKJXFGxWARs8kJZMx3OC.png',
            'data_theme' => 'gourmet',
        ]);

        DB::table('landing_contact')->insert([
            'telepon' => '+62 811-2828-188',
            'alamat' => 'desa karangmalang rt 004 rw 002, kecamatan gebog, kabupaten kudus, provinsi jawa tengah',
            'email' => 'mbatikkudus@gmail.com',
            'maps' => '@-6.7721234,110.8339916,374m',
        ]);

        DB::table('landing_about')->insert([
            'deskripsi' => "Pada tahun 1900an batik kudus mengalami kejayaan namun pada akhirnya mulai dilupakan dan, pada tahun 2005, Yuli Arstuti sebagai pemilik Muria Batik Kudus, mulai melakukan penelitian dan upaya pelestarian terhadap motif-motif khas Kudus. Melalui dedikasinya, motif motif khas Kudus berhasil bangkit kembali dan mendapatkan apresiasi yang lebih luas. Yuli Astuti tidak hanya menciptakan kembali motif-motif yang hampir punah, tetapi juga menggabungkannya dengan desain modern, sehingga hasil dari motif motifnya menjadi lebih relevan dan diminati oleh generasi muda.

            Batik Kudus merupakan salah satu jenis batik pesisir yang memiliki komposisi warna-warna yang terinspirasi oleh kehidupan di daerah pesisir. Warna-warna yang dominan adalah biru laut, hijau daun, cokelat pasir, dan nuansa warna-warna alam lainnya. Komposisi warna-warna pesisir ini memberikan kesan segar dan menenangkan pada batik Kudus.

            adalah satu ciri khas dari kain ini adalah keberagaman motif yang ada. Beberapa motif terkenal yang menjadi identitas tersendiri antara lain motif Parijhoto, motif Kapal Kandas, motif Cengkeh, motif Tembakau, motif Tari Kretek,motih air tiga rasa dan masih banyak lagi. Setiap motif tersebut memiliki cerita dan makna tersendiri, yang sering kali menggambarkan kehidupan masyarakat, alam sekitar, atau tradisi lokal yang khas.

            Keberhasilan Yuli Arstuti dalam menghidupkan kembali batik Kudus menjadi sebuah inspirasi bagi para perajin dan pecinta batik di Kudus. Upaya pelestarian dan pengembangan motif-motif batik Kudus terus dilakukan agar warisan budaya ini dapat tetap dikenal dan diapresiasi oleh generasi mendatang. yang menjadikannya sebagai salah satu kekayaan budaya Indonesia, dapat terus berkembang dan menjadi sumber kebanggaan bagi masyarakat Kudus dan Indonesia secara keseluruhan.",
        ]);
    }
}
