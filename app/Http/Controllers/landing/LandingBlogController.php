<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\postingan\Blog;
use Illuminate\Http\Request;

class LandingBlogController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::orderBy('updated_at', 'desc')->paginate(6); // 6 blog per halaman, sesuaikan jika mau
        $firstBlog = Blog::orderBy('updated_at', 'desc')->first(); // Untuk meta tag

        return view('page_landing.blog.index', compact('blogs', 'firstBlog'));
    }
    public function detail($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        $blogs = Blog::where('id', '!=', $blog->id)
            ->latest()
            ->paginate(6); // atau sesuaikan jumlah per halaman

        return view('page_landing.blog.detail', compact('blog', 'blogs'));
    }
}
