<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\BahanKeluarController;
use App\Http\Controllers\BahanMasukController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BahanKategoriController;
use App\Http\Controllers\CustomerKategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KeperluanController;
use App\Http\Controllers\landing\HomepageController;
use App\Http\Controllers\landing\LandingBlogController;
use App\Http\Controllers\landing\LandingProdukController;
use App\Http\Controllers\landing\SettingLandingController;
use App\Http\Controllers\postingan\BlogController;
use App\Http\Controllers\postingan\ProdukController;
use App\Http\Controllers\postingan\ProdukKategoriController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;



Route::prefix('admin')->group(function () {
    Route::middleware(['auth', 'role:0,1,2,3'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        // SETTING LANDING
        Route::prefix('landingsetting')->group(function () {
            Route::get('/main', [SettingLandingController::class, 'main'])->name('landingsetting.main');
            Route::put('/main', [SettingLandingController::class, 'updateMain'])->name('landingsetting.updatemain');
            Route::get('/about', [SettingLandingController::class, 'about'])->name('landingsetting.about');
            Route::put('/about', [SettingLandingController::class, 'updateAbout'])->name('landingsetting.updateabout');
            Route::get('/contact', [SettingLandingController::class, 'contact'])->name('landingsetting.contact');
            Route::put('/contact', [SettingLandingController::class, 'updateContact'])->name('landingsetting.updatecontact');

            Route::get('/prosesandvidio', [SettingLandingController::class, 'prosesandvidio'])->name('landingsetting.prosesandvidio');
            Route::get('/proses/create', [SettingLandingController::class, 'createProses'])->name('landingsetting.createproses');
            Route::post('/proses', [SettingLandingController::class, 'storeProses'])->name('landingsetting.storeproses');
            Route::get('/proses/{landingproses}/edit', [SettingLandingController::class, 'editProses'])->name('landingsetting.editproses');
            Route::put('/proses/{landingproses}', [SettingLandingController::class, 'updateProses'])->name('landingsetting.updateproses');
            Route::delete('/proses/{landingproses}', [SettingLandingController::class, 'destroyProses'])->name('landingsetting.destroyproses');
            Route::put('/vidio', [SettingLandingController::class, 'updateVidio'])->name('landingsetting.updatevidio');

            Route::get('/controllview', [SettingLandingController::class, 'controllview'])->name('landingsetting.controllview');
            Route::put('/controllview', [SettingLandingController::class, 'updateControllview'])->name('landingsetting.updatecontrollview');
        });
        Route::prefix('postingan')->group(function () {
            Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
            Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
            Route::post('/blogimage/upload', [BlogController::class, 'upload'])->name('image.upload');
            Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
            Route::get('/blog/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
            Route::put('/blog/{blog}', [BlogController::class, 'update'])->name('blog.update');
            Route::delete('/blog/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');

            Route::get('/produkkategori', [ProdukKategoriController::class, 'index'])->name('produkkategori.index');
            Route::get('/produkkategori/create', [ProdukKategoriController::class, 'create'])->name('produkkategori.create');
            Route::post('/produkkategori', [ProdukKategoriController::class, 'store'])->name('produkkategori.store');
            Route::get('/produkkategori/{produkkategori}/edit', [ProdukKategoriController::class, 'edit'])->name('produkkategori.edit');
            Route::put('/produkkategori/{produkkategori}', [ProdukKategoriController::class, 'update'])->name('produkkategori.update');
            Route::delete('/produkkategori/{produkkategori}', [ProdukKategoriController::class, 'destroy'])->name('produkkategori.destroy');

            Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
            Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
            Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
            Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
            Route::put('/produk/{produk}', [ProdukController::class, 'update'])->name('produk.update');
            Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');

            // add variasi produk
            Route::get('produk/{produk}/variasi/update', [ProdukController::class, 'variasi'])->name('produk.variasi.update');
            Route::post('produk/{produk}/variasi', [ProdukController::class, 'variasistore'])->name('produk.variasi.store');
        });
        // SETING ADMIN
        Route::get('/setting', [SettingController::class, 'setting'])->name('setting');
        Route::put('/setting', [SettingController::class, 'update'])->name('setting.update');
        // MASTER MENU CUSTOMER
        Route::get('/customerkategori', [CustomerKategoriController::class, 'index'])->name('customerkategori.index');
        Route::get('/customerkategori/create', [CustomerKategoriController::class, 'create'])->name('customerkategori.create');
        Route::post('/customerkategori', [CustomerKategoriController::class, 'store'])->name('customerkategori.store');
        Route::get('/customerkategori/{customerkategori}/edit', [CustomerKategoriController::class, 'edit'])->name('customerkategori.edit');
        Route::put('/customerkategori/{customerkategori}', [CustomerKategoriController::class, 'update'])->name('customerkategori.update');
        Route::delete('/customerkategori/{customerkategori}', [CustomerKategoriController::class, 'destroy'])->name('customerkategori.destroy');

        Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
        Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
        Route::post('/customer', [CustomerController::class, 'store'])->name('customer.store');
        Route::get('/customer/{customer}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
        Route::put('/customer/{customer}', [CustomerController::class, 'update'])->name('customer.update');
        Route::delete('/customer/{customer}', [CustomerController::class, 'destroy'])->name('customer.destroy');

        // MASTER MENU DATA BAHAN BAKU
        // Kategrori
        Route::get('/bahankategori', [BahanKategoriController::class, 'index'])->name('bahankategori.index');
        Route::get('/bahankategori/create', [BahanKategoriController::class, 'create'])->name('bahankategori.create');
        Route::post('/bahankategori', [BahanKategoriController::class, 'store'])->name('bahankategori.store');
        Route::get('/bahankategori/{bahankategori}/edit', [BahanKategoriController::class, 'edit'])->name('bahankategori.edit');
        Route::put('/bahankategori/{bahankategori}', [BahanKategoriController::class, 'update'])->name('bahankategori.update');
        Route::delete('/bahankategori/{bahankategori}', [BahanKategoriController::class, 'destroy'])->name('bahankategori.destroy');

        // Bahan
        Route::get('/bahan', [BahanController::class, 'index'])->name('bahan.index');
        Route::get('/bahan/data', [BahanController::class, 'getData'])->name('bahan.getData');
        Route::get('/bahan/create', [BahanController::class, 'create'])->name('bahan.create');
        Route::post('/bahan', [BahanController::class, 'store'])->name('bahan.store');
        Route::get('/bahan/{bahan}/edit', [BahanController::class, 'edit'])->name('bahan.edit');
        Route::put('/bahan/{bahan}', [BahanController::class, 'update'])->name('bahan.update');
        Route::delete('/bahan/{bahan}', [BahanController::class, 'destroy'])->name('bahan.destroy');

        // Keperluan
        Route::get('/keperluan', [KeperluanController::class, 'index'])->name('keperluan.index');
        Route::get('/keperluan/create', [KeperluanController::class, 'create'])->name('keperluan.create');
        Route::post('/keperluan', [KeperluanController::class, 'store'])->name('keperluan.store');
        Route::get('/keperluan/{keperluan}/edit', [KeperluanController::class, 'edit'])->name('keperluan.edit');
        Route::put('/keperluan/{keperluan}', [KeperluanController::class, 'update'])->name('keperluan.update');
        Route::delete('/keperluan/{keperluan}', [KeperluanController::class, 'destroy'])->name('keperluan.destroy');

        // Supplier
        Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
        Route::get('/supplier/export', [SupplierController::class, 'export'])->name('supplier.export');
        Route::get('/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
        Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
        Route::get('/supplier/{supplier}/edit', [SupplierController::class, 'edit'])->name('supplier.edit');
        Route::put('/supplier/{supplier}', [SupplierController::class, 'update'])->name('supplier.update');
        Route::delete('/supplier/{supplier}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

        // Bahan Masuk
        Route::get('/bahanmasuk', [BahanMasukController::class, 'index'])->name('bahanmasuk.index');
        Route::get('/bahanmasuk/export', [BahanMasukController::class, 'export'])->name('bahanmasuk.export');
        Route::get('/bahanmasuk/create', [BahanMasukController::class, 'create'])->name('bahanmasuk.create');
        Route::post('/bahanmasuk', [BahanMasukController::class, 'store'])->name('bahanmasuk.store');
        Route::get('/bahanmasuk/{bahanmasuk}/edit', [BahanMasukController::class, 'edit'])->name('bahanmasuk.edit');
        Route::put('/bahanmasuk/{bahanmasuk}', [BahanMasukController::class, 'update'])->name('bahanmasuk.update');
        Route::delete('/bahanmasuk/{bahanmasuk}', [BahanMasukController::class, 'destroy'])->name('bahanmasuk.destroy');
        Route::get('/bahan/export-excel', [BahanController::class, 'exportExcel'])->name('bahan.exportExcel');

        // Bahan Keluar
        Route::get('/bahankeluar', [BahanKeluarController::class, 'index'])->name('bahankeluar.index');
        Route::get('/bahankeluar/export', [BahanKeluarController::class, 'export'])->name('bahankeluar.export');
        Route::get('/bahankeluar/create', [BahanKeluarController::class, 'create'])->name('bahankeluar.create');
        Route::post('/bahankeluar', [BahanKeluarController::class, 'store'])->name('bahankeluar.store');
        Route::get('/bahankeluar/{bahankeluar}/edit', [BahanKeluarController::class, 'edit'])->name('bahankeluar.edit');
        Route::put('/bahankeluar/{bahankeluar}', [BahanKeluarController::class, 'update'])->name('bahankeluar.update');
        Route::delete('/bahankeluar/{bahankeluar}', [BahanKeluarController::class, 'destroy'])->name('bahankeluar.destroy');
    });
});


Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return redirect()->route('landing.homepage');
})->name('clear');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginpost', [AuthController::class, 'store'])->name('login.post');
Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

Route::get('auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [AuthController::class, 'handleGoogleCallback']);

Route::get('/', [HomepageController::class, 'index'])->name('landing.homepage');
Route::get('/about', [HomepageController::class, 'about'])->name('landing.about');
Route::get('/contact', [HomepageController::class, 'contact'])->name('landing.contact');
Route::get('/test', [HomepageController::class, 'test'])->name('landing.test');



Route::get('/produk', [LandingProdukController::class, 'indexproduk'])->name('landing.indexproduk');
Route::get('/produk/{slug}', [LandingProdukController::class, 'produkdetail'])->name('landing.produk');

Route::get('/blog', [LandingBlogController::class, 'index'])->name('landing.indexblog');
Route::get('/{slug}', [LandingBlogController::class, 'detail'])->name('landing.detailblog');
