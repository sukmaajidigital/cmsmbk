<div class="rounded-lg transition-transform transform hover:scale-105 overflow-hidden">
    <img src="{{ asset('storage/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="w-full h-40 object-cover">
    <div class="p-4">
        <h3 class="flex items-center gap-2 text-xl font-bold">{{ $blog->title }}</h3>
        <p class="text-sm mt-1 line-clamp-2 border-b pb-2 text-left">
            {{ \Illuminate\Support\Str::limit($blog->meta_description, 50) }}
        </p>
        <div class="flex items-center justify-between mt-2">
            <p class="text-lg text-base-content font-bold text-left">
                Rp {{ number_format($blog->harga, 0, ',', '.') }}
            </p>
            <a href="{{ route('landing.detailblog', $blog->slug) }}" class="bg-primary text-white px-4 py-2 rounded-lg shadow hover:bg-primary-dark transition">
                Detail
            </a>
        </div>
    </div>
</div>
