<?php

namespace App\Http\Controllers\postingan;

use App\Http\Controllers\Controller;
use App\Models\postingan\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function ajax()
    {
        $blogs = Blog::all();
        return response()->json($blogs);
    }
    public function index(): View
    {
        $blogs = Blog::all();
        return view('page_postingan.blog.index', compact('blogs'));
    }

    public function create(): View
    {
        return view('page_postingan.blog.form');
    }

    public function store(Request $request): RedirectResponse
    {
        // dd($request);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'harga' => 'required|integer',
            'stock' => 'required|integer',
            'sku' => 'nullable|string',
            'shopee' => 'nullable|string',
            'tokped' => 'nullable|string',
            'tiktokshop' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'produk_kategori_id' => 'required|array',
            'produk_kategori_id.*' => 'exists:produk_kategoris,id',
            'image' => 'nullable|image|max:2048', // tambahkan validasi file
        ]);
        try {
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('imageproduk', 'public');
            }
            // Buat produk langsung
            $blog = Blog::create([
                'name' => $validated['name'],
                'slug' => $validated['slug'],
                'description' => $validated['description'] ?? null,
                'harga' => $validated['harga'],
                'stock' => $validated['stock'],
                'sku' => $validated['sku'] ?? null,
                'image' => $validated['image'] ?? null,
                'shopee' => $validated['shopee'] ?? null,
                'tokped' => $validated['tokped'] ?? null,
                'tiktokshop' => $validated['tiktokshop'] ?? null,
                'meta_title' => $validated['meta_title'] ?? null,
                'meta_description' => $validated['meta_description'] ?? null,
                'meta_keywords' => $validated['meta_keywords'] ?? null,
            ]);

            // Langsung attach kategori pakai relasi
            $blog->kategoris()->attach($validated['produk_kategori_id']);

            return redirect()->route('blog.index')->with('success', 'Produk berhasil dibuat.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Gagal membuat produk. ' . $e->getMessage());
        }
    }

    public function edit(Blog $blog): View
    {
        return view('page_postingan.blog.edit', compact('blog'));
    }
    public function update(Request $request, Blog $blog): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'harga' => 'required|integer',
            'stock' => 'required|integer',
            'sku' => 'nullable|string',
            'shopee' => 'nullable|string',
            'tokped' => 'nullable|string',
            'tiktokshop' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'produk_kategori_id' => 'required|array',
            'produk_kategori_id.*' => 'exists:produk_kategoris,id',
            'image' => 'nullable|image|max:2048',
        ]);
        DB::beginTransaction();
        try {
            if ($request->hasFile('image')) {
                // Hapus gambar lama kalau ada
                if ($blog->image) {
                    Storage::disk('public')->delete($blog->image);
                }
                // Upload gambar baru
                $validated['image'] = $request->file('image')->store('imageproduk', 'public');
            }
            // Update produk
            $blog->update([
                'name' => $validated['name'],
                'slug' => $validated['slug'],
                'description' => $validated['description'] ?? null,
                'harga' => $validated['harga'],
                'stock' => $validated['stock'],
                'sku' => $validated['sku'] ?? null,
                'image' => $validated['image'] ?? $blog->image,
                'shopee' => $validated['shopee'] ?? null,
                'tokped' => $validated['tokped'] ?? null,
                'tiktokshop' => $validated['tiktokshop'] ?? null,
                'meta_title' => $validated['meta_title'] ?? null,
                'meta_description' => $validated['meta_description'] ?? null,
                'meta_keywords' => $validated['meta_keywords'] ?? null,
            ]);
            // Update kategori: sync akan replace otomatis (hapus yang lama, pasang yang baru)
            $blog->kategoris()->sync($validated['produk_kategori_id']);
            DB::commit();
            return redirect()->route('blog.index')->with('success', 'Produk berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->withErrors('Gagal memperbarui produk. ' . $e->getMessage());
        }
    }
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return to_route('blog.index')->with('success', 'bahan Deleted successfully.');
    }
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('images', 'public');

            return response()->json(['url' => Storage::url($path)]);
        }

        return response()->json(['error' => 'No image uploaded'], 400);
    }
}
