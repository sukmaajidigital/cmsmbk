<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\landing\LandingAbout;
use App\Models\landing\LandingContact;
use App\Models\landing\LandingControllview;
use App\Models\landing\LandingMain;
use App\Models\landing\LandingProses;
use App\Models\landing\LandingVidio;
use App\Models\postingan\Blog;
use App\Models\postingan\Produk;
use App\Models\postingan\ProdukKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Termwind\Components\Dd;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $landingmain = Cache::remember('landingmain', 300, function () {
            return LandingMain::first();
        });

        $landingcontact = Cache::remember('landingcontact', 300, function () {
            return LandingContact::first();
        });

        $landingabout = Cache::remember('landingabout', 300, function () {
            return LandingAbout::first();
        });

        $landingvidio = Cache::remember('landingvidio', 300, function () {
            return LandingVidio::first();
        });

        $landingproses = Cache::remember('landingproses', 300, function () {
            return LandingProses::all();
        });

        $landingcontrollview = Cache::remember('landingcontrollview', 300, function () {
            return LandingControllview::all();
        });

        $produkkategoris = Cache::remember('produkkategoris', 300, function () {
            return ProdukKategori::select('id', 'nama_kategori')->get();
        });

        // --- Produk dengan cache ---
        $produks = Cache::remember('landingpage_produks', 300, function () {
            $produkKategoriList = DB::table('produk_listkategoris')
                ->select('produk_kategori_id', 'produk_id')
                ->join('produks', 'produks.id', '=', 'produk_listkategoris.produk_id')
                ->orderBy('produks.created_at', 'desc') // produk terbaru
                ->get()
                ->groupBy('produk_kategori_id');

            $produkIds = collect();

            foreach ($produkKategoriList as $produkKategoriId => $produkList) {
                $produk = $produkList->first(); // Ambil satu produk terbaru per kategori
                if ($produk) {
                    $produkIds->push($produk->produk_id);
                }
            }
            return Produk::whereIn('id', $produkIds->unique())->take(8)->get();
        });

        $blogs = Cache::remember('landingpage_blogs', 300, function () {
            return Blog::orderBy('created_at', 'desc') // blog terbaru
                ->take(8)
                ->get();
        });

        // --- End produk dengan cache ---

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
                'blogs',
            )
        );
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
}
