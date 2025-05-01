<?php

namespace Database\Seeders;

use App\Models\postingan\Produk;
use App\Models\postingan\ProdukKategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProdukSeeder extends Seeder
{
    public function run()
    {
        // Data kategori produk dan harga
        $categories = [
            'batik tulis variasi cap' => 350000,
            'sarung batik' => 400000,
            'batik cap satu warna' => 150000,
            'batik cap variasi nitik' => 550000,
            'kaos' => 200000,
            'kemeja batik' => 400000,
            'outer' => 600000,
            'slint bag' => 100000,
            'syal cotton bamboo' => 350000,
        ];

        // Data produk yang terkait dengan kategori
        $produkData = [
            'batik tulis variasi cap' => [
                'tari kretek',
                'tembakau cengkeh',
                'gading patiayam',
                'taburan cengkeh',
                'parijotho pakis aji',
                'tembakau parijotho',
                'taburan tembakau',
                'rumah kapal menara',
                'gerbang k3',
                'pakis haji',
                'parijotho rejenu',
                'air tiga rasa',
                'kembang kupu',
                'ceplokan beras tumpah',
                'cerita rakyat bulusan',
                'diorama kretek',
            ],
            'sarung batik' => ['lasem1', 'lasem2', 'kudusan1', 'kudusan2', 'klasik1', 'klasik2'],
            'batik cap satu warna' => ['cengkeh', 'gerbang k3', 'diorama kretek', 'tembakau parijotho', 'tembakau cengkeh', 'buket parijotho'],
            'batik cap variasi nitik' => ['buketan parijotho', 'buket parijotho', 'buket cengkeh', 'gerbang k3', 'gading patiayam', 'buket kupu cengkeh'],
            'kaos' => ['kaos 1', 'kaos 2', 'kaos 3', 'kaos 4', 'kaos 5', 'kaos 6', 'kaos 7'],
            'kemeja batik' => ['kemeja 1', 'kemeja 2', 'kemeja 3', 'kemeja 4', 'kemeja 5'],
            'outer' => ['outer 1', 'outer 2', 'outer 3', 'outer 4', 'outer 5', 'outer 6'],
            'slint bag' => ['sb 1', 'sb 2', 'sb 3', 'sb 4', 'sb 5'],
            'syal cotton bamboo' => ['syal 1', 'syal 2', 'syal 3', 'syal 4', 'syal 5'],
        ];

        // Insert kategori produk ke dalam tabel produk_kategoris
        foreach ($categories as $categoryName => $harga) {
            $category = ProdukKategori::create([
                'nama_kategori' => $categoryName,
                'slug' => Str::slug($categoryName), // Gunakan Str::slug()
            ]);

            // Menyimpan produk yang sesuai dengan kategori
            if (isset($produkData[$categoryName])) {
                foreach ($produkData[$categoryName] as $productName) {
                    $produkSlug = Str::slug($productName) . '-' . Str::slug($categoryName);
                    $produk = Produk::create([
                        'name' => $productName,
                        'slug' => $produkSlug,
                        'description' => "Produk $productName adalah bagian dari kategori $categoryName dengan kualitas unggul dan motif khas.",
                        'harga' => $harga,
                        'stock' => 20,
                        'sku' => "$produkSlug",
                        'image' => "masterimagee/$categoryName/$productName.jpg",
                        'shopee' => "https://shopee.co.id/$productName",
                        'tokped' => "https://tokopedia.com/$productName",
                        'tiktokshop' => "https://tiktokshop.com/$productName",
                        'meta_title' => $productName,
                        'meta_description' => "Produk $productName adalah bagian dari kategori $categoryName dengan kualitas unggul dan motif khas.",
                        'meta_keywords' => "$productName $categoryName",
                    ]);
                    // Menghubungkan produk dengan kategori melalui tabel pivot
                    $category->produks()->attach($produk->id);  // Benar untuk hubungan many-to-many
                }
            }
        }
    }
}
