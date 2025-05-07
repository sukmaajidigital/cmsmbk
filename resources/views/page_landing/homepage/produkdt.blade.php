<div class="rounded-lg transition-transform transform hover:scale-105 overflow-hidden">
    <img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->name }}" class="w-full h-40 object-cover">
    <div class="p-4">
        <h3 class="flex items-center gap-2 text-xl font-bold">{{ $produk->name }}</h3>
        <p class="text-sm mt-1 line-clamp-2 border-b pb-2 text-left">
            {{ \Illuminate\Support\Str::limit($produk->description, 50) }}
        </p>
        <div class="flex items-center justify-between mt-2">
            <p class="text-lg text-base-content font-bold text-left">
                {{-- Rp {{ number_format($produk->harga, 0, ',', '.') }} --}}
            </p>
            <a href="{{ route('landing.produk', $produk->slug) }}" class="bg-primary text-white px-4 py-2 rounded-lg shadow hover:bg-primary-dark transition">
                Detail
            </a>
        </div>
    </div>
</div>
