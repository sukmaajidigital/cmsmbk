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
