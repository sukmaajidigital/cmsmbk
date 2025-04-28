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
            'Batik tulis variasi cap' => 350000,
            'Sarung Batik' => 400000,
            'Batik Cap Satu Warna' => 150000,
            'Batik Cap Variasi Nitik' => 550000,
            'Kaos' => 200000,
            'Kemeja Batik' => 400000,
            'Outer' => 600000,
            'Slint Bag' => 100000,
            'Syal Cotton Bamboo' => 350000,
        ];

        // Data produk yang terkait dengan kategori
        $produkData = [
            'Batik tulis variasi cap' => [
                'tari kretek',
                'tembakau cengkeh',
                'gading patiayam',
                'taburan cengkeh',
                'parijotho pakis aji',
                'tembakau parijotho',
                'taburan tembakau',
                'rumah kapal Menara',
                'gerbang k3',
                'pakis haji',
                'parijotho rejenu',
                'air tiga rasa',
                'kembang kupu',
                'ceplokan beras tumpah',
                'cerita rakyat bulusan',
                'diorama kretek',
            ],
            'Sarung Batik' => ['lasem1', 'lasem2', 'kudusan1', 'kudusan2', 'klasik1', 'klasik2'],
            'Batik Cap Satu Warna' => ['cengkeh', 'Gerbang K3', 'diorama kretek', 'tembakau parijotho', 'tembakau cengkeh', 'buket parijotho'],
            'Batik Cap Variasi Nitik' => ['Buketan Parijotho', 'Buket Parijotho', 'Buket cengkeh', 'Gerbang K3', 'Gading Patiayam', 'Buket Kupu cengkeh'],
            'Kaos' => ['Kaos 1', 'Kaos 2', 'Kaos 3', 'Kaos 4', 'Kaos 5', 'Kaos 6', 'Kaos 7'],
            'Kemeja Batik' => ['Kemeja 1', 'Kemeja 2', 'Kemeja 3', 'Kemeja 4', 'Kemeja 5'],
            'Outer' => ['Outer 1', 'Outer 2', 'Outer 3', 'Outer 4', 'Outer 5', 'Outer 6'],
            'Slint Bag' => ['sb 1', 'sb 2', 'sb 3', 'sb 4', 'sb 5'],
            'Syal Cotton Bamboo' => ['Syal 1', 'Syal 2', 'Syal 3', 'Syal 4', 'Syal 5'],
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
                        'image' => "masterimage/$categoryName/$productName.jpg",
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
