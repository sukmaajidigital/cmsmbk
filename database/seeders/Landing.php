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
            'telepon' => '628112828188',
            'alamat' => 'desa karangmalang rt 004 rw 002, kecamatan gebog, kabupaten kudus, provinsi jawa tengah',
            'email' => 'mbatikkudus@gmail.com',
            'maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.797399489367!2d110.832489110015!3d-6.772255666197173!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70db15bce5f05d%3A0x3c2a617369092d32!2sMuria%20Batik%20kudus!5e1!3m2!1sid!2sid!4v1745849648233!5m2!1sid!2sid',
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
            'proses_subtitle' => 'Setiap helai batik bukan hanya kain bermotif',
            'produk_title' => 'Produk',
            'produk_subtitle' => 'Koleksi Produk Batik Terbaru kami',
        ]);

        DB::table('landing_proses')->insert([
            [
                'judul' => 'Njaplak',
                'deskripsi' => 'Proses njaplak merupakan tahap awal dalam membatik, di mana pola dasar atau motif batik dipindahkan dari desain kertas ke kain. Teknik ini biasanya menggunakan alat seperti pensil atau canting kosong tanpa malam untuk menyalin pola secara presisi. Tahap ini sangat penting karena akan menjadi panduan utama dalam seluruh proses membatik berikutnya.',
                'imageproses' => 'imageproses/1.png',
            ],
            [
                'judul' => 'Ngecap',
                'deskripsi' => 'Ngecap adalah proses pencetakan motif batik menggunakan cap tembaga yang telah dibentuk sesuai desain. Cap ini dicelupkan ke malam panas lalu ditekan ke kain dengan hati-hati agar motif tercetak rapi. Proses ini mempercepat pembuatan batik dibandingkan teknik tulis, namun tetap membutuhkan ketelitian tinggi agar hasilnya presisi dan tidak meluber.',
                'imageproses' => 'imageproses/2.png',
            ],
            [
                'judul' => 'Nyanting',
                'deskripsi' => 'Nyanting adalah proses menggambar motif batik secara manual dengan canting dan malam panas di atas kain. Proses ini membutuhkan keahlian dan ketelatenan tinggi, karena garis dan titik harus ditorehkan secara halus sesuai pola. Setiap goresan canting menciptakan karakter unik yang membedakan batik tulis dengan jenis lainnya.',
                'imageproses' => 'imageproses/4.png',
            ],
            [
                'judul' => 'Nyolet',
                'deskripsi' => 'Nyolet merupakan proses pewarnaan motif batik secara manual dengan kuas kecil atau alat khusus. Biasanya dilakukan untuk memberikan warna pada bagian-bagian tertentu dari motif sebelum proses celup warna dilakukan. Teknik ini menambah nuansa artistik dan memperkaya tampilan visual batik dengan gradasi warna yang halus.',
                'imageproses' => 'imageproses/5.png',
            ],
            [
                'judul' => 'Nembok',
                'deskripsi' => 'Nembok adalah proses menutup bagian tertentu dari kain batik menggunakan malam agar tidak terkena warna saat dicelup. Tahap ini berguna untuk mempertahankan warna asli pada area tertentu, dan sering dilakukan berulang kali dalam batik dengan banyak lapisan warna. Proses ini memerlukan perencanaan warna yang cermat dan ketelitian tinggi.',
                'imageproses' => 'imageproses/6.png',
            ],
            [
                'judul' => 'Ngewarna',
                'deskripsi' => 'Ngewarna atau mencelup kain ke dalam larutan pewarna adalah tahap penting untuk memberikan warna dasar pada batik. Proses ini dilakukan setelah motif tertutup malam. Kadang dilakukan beberapa kali dengan warna yang berbeda untuk menciptakan efek berlapis. Penggunaan pewarna alami maupun sintetis sangat mempengaruhi hasil akhir batik.',
                'imageproses' => 'imageproses/7.png',
            ],
            [
                'judul' => 'Ngelorod',
                'deskripsi' => 'Ngelorod adalah proses merebus kain batik dalam air panas untuk menghilangkan malam yang menempel. Setelah malam larut, akan tampak jelas perbedaan warna antara bagian yang tertutup dan yang terkena pewarna. Tahap ini mengungkap keindahan motif batik secara utuh dan menjadi penutup dari proses panjang membatik.',
                'imageproses' => 'imageproses/8.png',
            ],
            [
                'judul' => 'Jemur',
                'deskripsi' => 'Jemur adalah proses akhir untuk mengeringkan kain batik setelah melalui pewarnaan dan ngelorod. Penjemuran dilakukan di tempat terbuka namun teduh agar warna tidak pudar terkena sinar matahari langsung. Tahap ini memastikan kain benar-benar kering sebelum siap digunakan atau dipasarkan sebagai kain batik yang utuh.',
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
