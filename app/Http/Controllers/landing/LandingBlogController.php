<?php

namespace App\Http\Controllers\landing;

use App\Http\Controllers\Controller;
use App\Models\postingan\Blog;
use Illuminate\Http\Request;

class LandingBlogController extends Controller
{
    public function index(Request $request)
    {
        return view('page_landing.blog.index');
    }
    public function detail($slug)
    {
        // Ambil produk berdasarkan slug
        $blog = Blog::where('slug', $slug)->first();
        // Return view dengan data yang dibutuhkan
        return view('page_landing.blog.detail', compact('blog'));
    }
}
