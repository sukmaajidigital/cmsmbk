<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\landing\LandingAbout;
use App\Models\landing\LandingContact;
use App\Models\landing\LandingControllview;
use App\Models\landing\LandingMain;
use App\Models\landing\LandingProses;
use App\Models\landing\LandingVidio;
use App\Models\postingan\Produk;
use App\Models\postingan\ProdukKategori;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $landingmain = LandingMain::first();
        $landingcontact = LandingContact::first();
        $landingabout = LandingAbout::first();
        $landingvidio = LandingVidio::first();
        $landingproses = LandingProses::all();
        $landingcontrollview = LandingControllview::all();

        $produks = Produk::all();
        $produkkategoris = ProdukKategori::select('id', 'nama_kategori')->get();
        return view(
            'page_landing.homepage',
            compact(
                'landingmain',
                'landingcontact',
                'landingabout',
                'landingvidio',
                'landingproses',
                'landingcontrollview',
                'produks',
                'produkkategoris',
            )
        );
    }
    public function getlistproduk(Request $request)
    {
        $produks = Produk::paginate(8); // Pastikan paginate sesuai kebutuhan
        if ($request->ajax()) {
            return view('page_landing.homepage.produklist', compact('produks'))->render();
        }
        return redirect()->route('landing.homepage');
    }
    public function about()
    {
        $landingmain = LandingMain::first();
        $landingcontact = LandingContact::first();
        $landingabout = LandingAbout::first();
        return view('page_landing.about', compact('landingmain', 'landingcontact', 'landingabout'));
    }
    public function contact()
    {
        $landingmain = LandingMain::first();
        $landingcontact = LandingContact::first();
        $landingabout = LandingAbout::first();
        return view('page_landing.contact', compact('landingmain', 'landingcontact', 'landingabout'));
    }
    public function test()
    {
        $landingmain = LandingMain::first();
        $landingcontact = LandingContact::first();
        $landingabout = LandingAbout::first();
        return view('page_landing.test', compact('landingmain', 'landingcontact', 'landingabout'));
    }
    public function produk($slug)
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
            ->limit(6) // Limit jumlah produk sejenis yang ditampilkan
            ->get();

        // Ambil data lainnya
        $landingmain = LandingMain::first();
        $landingcontact = LandingContact::first();
        $landingabout = LandingAbout::first();

        // Return view dengan data yang dibutuhkan
        return view('page_landing.produk.detail', compact('landingmain', 'landingcontact', 'landingabout', 'produk', 'produksejenis'));
    }
}
