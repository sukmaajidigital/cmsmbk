<?php

namespace App\Http\Controllers\postingan;

use App\Http\Controllers\Controller;
use App\Models\postingan\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
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
        $blogs = Blog::orderBy('updated_at', 'desc')->get();
        return view('page_postingan.blog.index', compact('blogs'));
    }


    public function create(): View
    {
        return view('page_postingan.blog.form');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'content' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'featured_image' => 'nullable|file',
            'is_published' => 'required|boolean',
            'published_at' => 'nullable|date',
        ]);
        $manager = new ImageManager(new Driver());
        try {
            $upload = $request->file('featured_image');
            // $width = $manager->read($upload)->width() / $angka;
            // $height = $manager->read($upload)->height() / $angka;

            $filename = now()->timestamp . '.' . $upload->getClientOriginalExtension();
            $path = 'blog_images/' . $filename;

            $image = Image::read($upload)
                ->scaleDown(width: 900, height: 900) // NEK LUWEH 900 PX
                ->encodeByExtension($upload->getClientOriginalExtension(), quality: 100); // Tambahkan encode dan kualitas kompresi

            Storage::disk('public')->put($path, $image);
            // if ($request->hasFile('featured_image')) {
            //     $featuredImagePath = $request->file('featured_image')->store('blog_images', 'public');
            // }

            $blog = new Blog();
            $blog->title = $validated['title'];
            $blog->slug = $validated['slug'];
            $blog->excerpt = $validated['meta_description'] ?? null;
            $blog->content = $validated['content'];
            $blog->meta_title = $validated['meta_title'] ?? null;
            $blog->meta_description = $validated['meta_description'] ?? null;
            $blog->meta_keywords = $validated['meta_keywords'] ?? null;
            $blog->canonical_url = $validated['slug'] ?? null;
            $blog->og_title = $validated['title'] ?? null;
            $blog->og_description = $validated['meta_description'] ?? null;
            $blog->featured_image = $path;
            $blog->featured_image_alt = $validated['slug'] ?? null;
            $blog->og_image = $path;
            $blog->is_published = $validated['is_published'];
            $blog->published_at = $validated['published_at'] ?? null;
            $blog->user_id = Auth::id();

            $blog->save();

            return redirect()->route('blog.index')->with('success', 'Blog berhasil disimpan.');
        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors('Gagal menyimpan blog. ' . $e->getMessage());
        }
    }

    public function edit(Blog $blog): View
    {
        return view('page_postingan.blog.edit', compact('blog'));
    }
    public function update(Request $request, Blog $blog): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug,' . $blog->id,
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'canonical_url' => 'nullable|string|max:255',
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'featured_image_alt' => 'nullable|string|max:255',
            'og_image' => 'nullable|image|max:2048',
            'is_published' => 'required|boolean',
            'published_at' => 'nullable|date',
        ]);

        DB::beginTransaction();
        try {
            if ($request->hasFile('featured_image')) {
                if ($blog->featured_image) {
                    Storage::disk('public')->delete($blog->featured_image);
                }
                $validated['featured_image'] = $request->file('featured_image')->store('blog_images', 'public');
            }

            if ($request->hasFile('og_image')) {
                if ($blog->og_image) {
                    Storage::disk('public')->delete($blog->og_image);
                }
                $validated['og_image'] = $request->file('og_image')->store('blog_og_images', 'public');
            }

            $blog->update($validated);

            DB::commit();
            return redirect()->route('blog.index')->with('success', 'Blog berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()
                ->withInput()
                ->withErrors('Gagal memperbarui blog. ' . $e->getMessage());
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
