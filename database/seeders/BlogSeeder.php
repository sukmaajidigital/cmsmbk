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
            'title' => 'Proses Membatik',
            'slug' => 'proses-membatik',
            'excerpt' => 'Membatik adalah seni tradisional yang tidak hanya melibatkan keindahan visual, tetapi juga ketelatenan, kesabaran, dan filosofi mendalam dalam setiap tahapannya. Proses membatik merupakan rangkaian kegiatan yang dimulai dari merancang pola hingga menghasilkan kain bermotif yang sarat makna budaya.',
            'content' => '<div style="text-align: justify; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Membatik adalah seni tradisional yang tidak hanya melibatkan keindahan visual, tetapi juga ketelatenan, kesabaran, dan filosofi mendalam dalam setiap tahapannya. Proses membatik merupakan rangkaian kegiatan yang dimulai dari merancang pola hingga menghasilkan kain bermotif yang sarat makna budaya.</div>

<p style="text-align: justify; "><br /></p>

<div style="text-align: center;"><img style="width: auto;" src="/storage/images/0.jpg" /></div>

<p style="text-align: center;"><br /></p>

<ul style="list-style: circle;"><li style="text-align: left;">Njaplak</li></ul>

<div><br /></div>
<div style="text-align: center;"><img style="width: 50%;" src="/storage/images/1.png" /></div>
<p style="text-align: center;"><br /></p>
<div style="text-align: justify; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Proses njaplak merupakan tahap awal dalam membatik, di mana pola dasar atau motif batik dipindahkan dari desain kertas ke kain. Teknik ini biasanya menggunakan alat seperti pensil atau canting kosong tanpa malam untuk menyalin pola secara presisi. Tahap ini sangat penting karena akan menjadi panduan utama dalam seluruh proses membatik berikutnya.<br /></div>
<p><br /></p>
<ul style="list-style: circle;"><li style="text-align: left;">Ngecap</li></ul>
<div><br /></div>
<div style="text-align: center;"><img style="width: 50%;" src="/storage/images/2.png" /></div>
<p style="text-align: center;"><br /></p>
<div style="text-align: justify; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ngecap adalah proses pencetakan motif batik menggunakan cap tembaga yang telah dibentuk sesuai desain. Cap ini dicelupkan ke malam panas lalu ditekan ke kain dengan hati-hati agar motif tercetak rapi. Proses ini mempercepat pembuatan batik dibandingkan teknik tulis, namun tetap membutuhkan ketelitian tinggi agar hasilnya presisi dan tidak meluber.<br /></div>
<p style="text-align: justify; "><br /></p>
<ul style="list-style: circle;"><li style="text-align: left;">Nyanting</li></ul>
<div><br /></div>
<div style="text-align: center;"><img style="width: 50%;" src="/storage/images/3.png" /></div>
<p style="text-align: center;"><br /></p>
<div style="text-align: justify; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nyanting adalah proses menggambar motif batik secara manual dengan canting dan malam panas di atas kain. Proses ini membutuhkan keahlian dan ketelatenan tinggi, karena garis dan titik harus ditorehkan secara halus sesuai pola. Setiap goresan canting menciptakan karakter unik yang membedakan batik tulis dengan jenis lainnya.<br /></div>

<p><br /></p>

<ul style="list-style: circle;"><li style="text-align: left;">Nyolet</li></ul>

<div><br /></div>

<div style="text-align: center;"><img style="width: 50%;" src="/storage/images/4.png" /></div>

<p style="text-align: center;"><br /></p>

<div style="text-align: justify; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nyolet merupakan proses pewarnaan motif batik secara manual dengan kuas kecil atau alat khusus. Biasanya dilakukan untuk memberikan warna pada bagian-bagian tertentu dari motif sebelum proses celup warna dilakukan. Teknik ini menambah nuansa artistik dan memperkaya tampilan visual batik dengan gradasi warna yang halus.<br /></div>

<p><br /></p>

<ul style="list-style: circle;"><li style="text-align: left;">Nembok</li></ul>

<div><br /></div>
<div style="text-align: center;"><img style="width: 50%;" src="/storage/images/5.png" /></div>
<p style="text-align: center;"><br /></p>
<div style="text-align: justify; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nembok adalah proses menutup bagian tertentu dari kain batik menggunakan malam agar tidak terkena warna saat dicelup. Tahap ini berguna untuk mempertahankan warna asli pada area tertentu, dan sering dilakukan berulang kali dalam batik dengan banyak lapisan warna. Proses ini memerlukan perencanaan warna yang cermat dan ketelitian tinggi.<br /></div>
<p><br /></p>

<ul style="list-style: circle;"><li style="text-align: left;">Ngewarna</li></ul>

<div><br /></div>

<div style="text-align: center;"><img style="width: 50%;" src="/storage/images/6.png" /></div>

<p style="text-align: center;"><br /></p>

<div style="text-align: justify; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ngewarna atau mencelup kain ke dalam larutan pewarna adalah tahap penting untuk memberikan warna dasar pada batik. Proses ini dilakukan setelah motif tertutup malam. Kadang dilakukan beberapa kali dengan warna yang berbeda untuk menciptakan efek berlapis. Penggunaan pewarna alami maupun sintetis sangat mempengaruhi hasil akhir batik.<br /></div>

<p style="text-align: justify; "><br /></p>

<ul style="list-style: circle;"><li style="text-align: left;">Ngelorod</li></ul>

<div><br /></div>

<div style="text-align: center;"><img style="width: 50%;" src="/storage/images/7.png" /></div>

<p style="text-align: center;"><br /></p>

<div style="text-align: justify; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ngelorod adalah proses merebus kain batik dalam air panas untuk menghilangkan malam yang menempel. Setelah malam larut, akan tampak jelas perbedaan warna antara bagian yang tertutup dan yang terkena pewarna. Tahap ini mengungkap keindahan motif batik secara utuh dan menjadi penutup dari proses panjang membatik.<br /></div>

<p><br /></p>

<ul style="list-style: circle;"><li style="text-align: left;">Jemur<br /></li></ul>

<div><br /></div>

<div style="text-align: center;"><img style="width: 50%;" src="/storage/images/8.png" /></div>

<p style="text-align: center;"><br /></p>

<div style="text-align: justify; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jemur adalah proses akhir untuk mengeringkan kain batik setelah melalui pewarnaan dan ngelorod. Penjemuran dilakukan di tempat terbuka namun teduh agar warna tidak pudar terkena sinar matahari langsung. Tahap ini memastikan kain benar-benar kering sebelum siap digunakan atau dipasarkan sebagai kain batik yang utuh.<br /></div>


<br />',

            // SEO Fields
            'meta_title' => 'Proses Membatik',
            'meta_description' => 'Membatik adalah seni tradisional yang tidak hanya melibatkan keindahan visual, tetapi juga ketelatenan, kesabaran, dan filosofi mendalam dalam setiap tahapannya. Proses membatik merupakan rangkaian kegiatan yang dimulai dari merancang pola hingga menghasilkan kain bermotif yang sarat makna budaya.',

            'meta_keywords' => 'proses batik, batik proses, batik proces, batik, batik kudus, kudus, proses',

            'canonical_url' => 'https://muriabatik.com.muriabatikkudus.com/blog/proses-membatik',

            'og_title' => 'Proses Membatik ',

            'og_description' => 'Membatik adalah seni tradisional yang tidak hanya melibatkan keindahan visual, tetapi juga ketelatenan, kesabaran, dan filosofi mendalam dalam setiap tahapannya. Proses membatik merupakan rangkaian kegiatan yang dimulai dari merancang pola hingga menghasilkan kain bermotif yang sarat makna budaya.',
            'og_image' => 'blog_images/0.jpg',

            // Image
            'featured_image' => 'blog_images/0.jpg',
            'featured_image_alt' => 'proses-membatik',

            // Additional
            'user_id' => 1, // pastikan user_id 1 ada, atau sesuaikan
            'is_published' => 2,
            'published_at' => now()->format('Y-m-d H:i:s'),
        ]);
    }
}
