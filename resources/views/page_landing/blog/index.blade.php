<x-landinglayouts>
    <x-slot name="meta">
        @if ($firstBlog)
            <meta name="keywords" content="{{ $firstBlog->meta_keywords ?? 'batik, dokumentasi, blog' }}">
            <meta name="author" content="{{ $firstBlog->user->name ?? 'Admin' }}">
            <meta name="description" content="{{ $firstBlog->meta_description ?? Str::limit(strip_tags($firstBlog->excerpt), 150) }}">
            <meta name="twitter:title" content="{{ $firstBlog->meta_title ?? $firstBlog->title }}">
            <meta name="twitter:description" content="{{ $firstBlog->meta_description ?? Str::limit(strip_tags($firstBlog->excerpt), 150) }}">
            <meta name="twitter:image" content="{{ $firstBlog->featured_image ? asset('storage/' . $firstBlog->featured_image) : asset('default-image.jpg') }}">
            <meta property="og:image" content="{{ $firstBlog->featured_image ? asset('storage/' . $firstBlog->featured_image) : asset('default-image.jpg') }}">
            <meta property="og:description" content="{{ $firstBlog->meta_description ?? Str::limit(strip_tags($firstBlog->excerpt), 150) }}">
        @else
            {{-- Default meta kalau belum ada blog --}}
            <meta name="keywords" content="blog, dokumentasi, batik">
            <meta name="author" content="Admin">
            <meta name="description" content="Dokumentasi dan informasi seputar batik.">
        @endif
    </x-slot>

    <x-slot name="subname">
        Blog
    </x-slot>

    <section class="w-full py-10 bg-gray-50" id="blog">
        <div class="container mx-auto px-4">
            {{-- Header --}}
            <div class="text-center mb-10">
                <h2 class="text-4xl font-bold text-gray-800">Blog Dokumentasi Batik</h2>
                <p class="text-gray-600 mt-2">Berbagai artikel seputar sejarah, motif, dan filosofi batik.</p>
            </div>

            {{-- Blog List --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($blogs as $blog)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                        <a href="{{ route('landing.detailblog', $blog->slug) }}">
                            @if ($blog->featured_image)
                                <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->featured_image_alt ?? $blog->title }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">
                                    No Image
                                </div>
                            @endif
                            <div class="p-4">
                                <h3 class="font-semibold text-lg text-gray-800 mb-2 line-clamp-2">{{ $blog->title }}</h3>
                                <p class="text-gray-600 text-sm line-clamp-3 mb-4">{{ $blog->excerpt ?? Str::limit(strip_tags($blog->content), 100) }}</p>
                                <div class="text-right">
                                    <span class="text-xs text-gray-400">{{ $blog->published_at }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <p class="text-center text-gray-500 col-span-full">Belum ada blog yang tersedia.</p>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-10 flex justify-center">
                {{ $blogs->links() }}
            </div>
        </div>
    </section>
</x-landinglayouts>
