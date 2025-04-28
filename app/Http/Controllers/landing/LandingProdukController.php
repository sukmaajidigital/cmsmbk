<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\landing\LandingAbout;
use App\Models\landing\LandingContact;
use App\Models\landing\LandingMain;
use App\Models\postingan\Produk;
use App\Models\postingan\ProdukKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class LandingProdukController extends Controller
{
    public function indexproduk(Request $request)
    {
        $landingmain = Cache::remember('landingmain', 300, function () {
            return LandingMain::first();
        });
        $produkkategoris = Cache::remember('produkkategoris', 300, function () {
            return ProdukKategori::select('id', 'nama_kategori')->get();
        });

        // Produk: Cache hanya query dasar
        $produkQuery = Produk::query(); // Tidak cache paginasi
        $produks = $produkQuery->paginate(16);
        return view(
            'page_landing.produk.index',
            compact(
                'landingmain',
                'produks',
                'produkkategoris',
            )
        );
    }
    public function produkdetail($slug)
    {
        // Ambil produk berdasarkan slug
        $produk = Produk::where('slug', $slug)->first();

        // Jika produk tidak ditemukan, tampilkan halaman 404
        if (!$produk) {
            abort(404, 'Produk tidak ditasdasdasdaemukan');
        }

        // Ambil kategori produk yang sedang dilihat
        $kategoriIds = $produk->kategoris->pluck('id')->toArray();

        // Cari produk lain yang sejenis berdasarkan kategori, kecuali produk yang sedang dilihat
        $produksejenis = Produk::whereHas('kategoris', function ($query) use ($kategoriIds) {
            $query->whereIn('produk_kategoris.id', $kategoriIds);
        })->where('id', '!=', $produk->id) // Exclude the current product
            ->limit(8) // Limit jumlah produk sejenis yang ditampilkan
            ->get();

        // Ambil data lainnya
        $landingmain = LandingMain::first();
        $landingcontact = LandingContact::first();
        $landingabout = LandingAbout::first();

        // Return view dengan data yang dibutuhkan
        return view('page_landing.produk.detail', compact('landingmain', 'landingcontact', 'landingabout', 'produk', 'produksejenis'));
    }
}
