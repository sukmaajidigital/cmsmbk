<?php

namespace App\Http\Controllers\postingan;

use App\Http\Controllers\Controller;
use App\Models\postingan\Produk;
use App\Models\postingan\ProdukKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Maatwebsite\Excel\Excel;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProdukController extends Controller
{
    public function ajax()
    {
        $produks = Produk::all();
        return response()->json($produks);
    }
    public function index(): View
    {
        $produks = Produk::all();
        $produkkategoris = ProdukKategori::select('id', 'nama_kategori')->get();
        return view('page_postingan.produk.index', compact('produks', 'produkkategoris'));
    }

    public function create(): View
    {
        $produkkategoris = ProdukKategori::all();
        return view('page_postingan.produk.form', compact('produkkategoris'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:produks,slug',
            'description' => 'nullable|string',
            'harga' => 'required|integer',
            'stock' => 'required|integer',
            'sku' => 'nullable|string|unique:produks,sku',

            'shopee' => 'nullable',
            'tokped' => 'nullable',
            'tiktokshop' => 'nullable',

            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',

            'produk_kategori_id' => 'required',
            'produk_kategori_id.*' => 'exists:produk_kategoris,id',
        ]);
        // dd($request);
        try {
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('imageproduk', 'public');
                if (isset($produk) && $produk->image) {
                    Storage::disk('public')->delete($produk->image);
                }
                $validated['image'] = $imagePath;
            }

            $produk = Produk::create([
                'name' => $validated['name'],
                'slug' => $validated['slug'],
                'description' => $validated['description'] ?? null,
                'harga' => $validated['harga'],
                'stock' => $validated['stock'],
                'sku' => $validated['sku'] ?? null,
                'image' => $imagePath,
                'shopee' => $validated['shopee'] ?? null,
                'tokped' => $validated['tokped'] ?? null,
                'tiktokshop' => $validated['tiktokshop'] ?? null,
                'meta_title' => $validated['meta_title'] ?? null,
                'meta_description' => $validated['meta_description'] ?? null,
                'meta_keywords' => $validated['meta_keywords'] ?? null,
            ]);

            $produk->kategoris()->attach($validated['produk_kategori_id']);

            return redirect()->route('produk.index')->with('success', 'Produk berhasil dibuat.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Gagal membuat produk. ' . $e->getMessage());
        }
    }



    public function edit(Produk $produk): View
    {
        $produkkategoris = ProdukKategori::all();
        return view('page_postingan.produk.edit', compact('produk', 'produkkategoris'));
    }
    public function update(Request $request, Produk $produk): RedirectResponse
    {
        try {
            $produk->update($request->except('produk_kategori_id'));

            // Sync kategori yang dipilih
            $produk->kategoris()->sync($request->input('produk_kategori_id', []));

            return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Gagal memperbarui produk. ' . $e->getMessage());
        }
    }
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return to_route('produk.index')->with('success', 'bahan Deleted successfully.');
    }
}
