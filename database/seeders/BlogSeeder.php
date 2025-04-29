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
            $title = 'Judul Blog Contoh ' . $i;
            $slug = Str::slug($title) . '-' . $i;

            Blog::create([
                'title' => $title,
                'slug' => $slug,
                'excerpt' => 'Ini adalah ringkasan dari blog contoh ke-' . $i . '.',
                'content' => '<p>Ini adalah konten lengkap dari blog contoh ke-' . $i . '.</p>',

                // SEO Fields
                'meta_title' => 'Meta Title Blog ' . $i,
                'meta_description' => 'Deskripsi meta untuk blog contoh ke-' . $i,
                'meta_keywords' => 'blog, contoh, seeder, laravel',
                'canonical_url' => 'https://example.com/blog/' . $slug,
                'og_title' => 'OG Title Blog ' . $i,
                'og_description' => 'OG Description untuk blog contoh ke-' . $i,
                'og_image' => 'images/og-image-' . $i . '.jpg',

                // Image
                'featured_image' => 'images/featured-image-' . $i . '.jpg',
                'featured_image_alt' => 'Gambar untuk blog contoh ' . $i,

                // Additional
                'user_id' => 1, // pastikan user_id 1 ada, atau sesuaikan
                'is_published' => $i % 2 == 0, // genap published, ganjil draft
                'published_at' => $i % 2 == 0 ? now()->subDays($i) : null,
            ]);
        }
    }
}
