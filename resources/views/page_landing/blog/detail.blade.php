{{-- resources/views/page_landing/blog/detail.blade.php --}}
<x-landinglayouts>
    <x-slot name="meta">
        {{-- Meta SEO dinamis --}}
        <title>{{ $blog->meta_title ?? $blog->title }}</title>
        <meta name="description" content="{{ $blog->meta_description ?? Str::limit(strip_tags($blog->content), 150) }}">
        <meta name="keywords" content="{{ $blog->meta_keywords ?? 'blog' }}">
        <meta name="author" content="{{ $blog->user->name ?? 'Admin' }}">

        {{-- Twitter Card --}}
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $blog->meta_title ?? $blog->title }}">
        <meta name="twitter:description" content="{{ $blog->meta_description ?? Str::limit(strip_tags($blog->content), 150) }}">
        <meta name="twitter:image" content="{{ $blog->og_image ? asset('storage/' . $blog->og_image) : asset('default-og-image.jpg') }}">

        {{-- Open Graph / Facebook --}}
        <meta property="og:type" content="article">
        <meta property="og:title" content="{{ $blog->og_title ?? $blog->title }}">
        <meta property="og:description" content="{{ $blog->og_description ?? Str::limit(strip_tags($blog->content), 150) }}">
        <meta property="og:image" content="{{ $blog->og_image ? asset('storage/' . $blog->og_image) : asset('default-og-image.jpg') }}">
        <meta property="og:url" content="{{ url()->current() }}">
    </x-slot>

    <x-slot name="subname">
        Blog
    </x-slot>

    <section class="w-full py-10" id="blog">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                {{-- Konten Blog --}}
                <div class="md:col-span-4 pr-0 md:pr-6">
                    {{-- Header --}}
                    <div class="text-center mb-10">
                        <h1 class="text-3xl md:text-4xl font-bold text-gray-800">{{ $blog->title }}</h1>
                        @if ($blog->published_at)
                            <p class="text-sm text-gray-500 mt-2">Dipublikasikan pada {{ $blog->published_at }}</p>
                        @endif
                    </div>

                    {{-- Featured Image --}}
                    @if ($blog->featured_image)
                        <div class="flex justify-center mb-8">
                            <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->featured_image_alt ?? $blog->title }}" class="rounded-lg shadow-md max-h-[500px] w-auto object-cover">
                        </div>
                    @endif
                    {!! $blog->content !!}
                </div>

                {{-- Sidebar Blog List --}}
                <div class="md:col-span-1">
                    <div class="md:sticky md:top-20 mt-10 md:mt-0">
                        <h2 class="text-xl font-semibold mb-4 text-gray-800">Latest Post</h2>
                        <ul class="space-y-4">
                            @forelse ($blogs as $item)
                                <li class="bg-white shadow-sm rounded-lg overflow-hidden border hover:shadow-md transition duration-200">
                                    <a href="{{ route('landing.detailblog', $item->slug) }}" class="flex items-center space-x-4 p-3">
                                        {{-- Gambar Thumbnail --}}
                                        @if ($item->featured_image)
                                            <img src="{{ asset('storage/' . $item->featured_image) }}" alt="{{ $item->featured_image_alt ?? $item->title }}" class="w-16 h-16 object-cover rounded-md">
                                        @else
                                            <div class="w-16 h-16 bg-gray-200 rounded-md flex items-center justify-center text-gray-400 text-xs">
                                                Tidak ada gambar
                                            </div>
                                        @endif

                                        {{-- Judul --}}
                                        <div class="flex-1">
                                            <h3 class="text-sm font-semibold text-gray-800 hover:text-blue-600 line-clamp-2">
                                                {{ $item->title }}
                                            </h3>
                                        </div>
                                    </a>
                                </li>
                            @empty
                                <li class="text-gray-500 text-sm">Belum ada blog lainnya.</li>
                            @endforelse
                        </ul>

                        {{-- Pagination --}}
                        <div class="mt-6">
                            {{ $blogs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</x-landinglayouts>
