<x-landinglayouts>
    <x-slot name="meta">
        <meta name="keywords" content="{{ $produk->meta_keywords }}">
        <meta name="author" content="admin">
        <meta name="description" content="{{ $produk->meta_description }}">
        <meta name="twitter:title" content="{{ $produk->meta_title }}">
        <meta name="twitter:description" content="{{ $produk->meta_description }}">
        <meta name="twitter:image" content="{{ asset('storage/' . $produk->image) }}">
        <meta property="og:image" content="{{ asset('storage/' . $produk->image) }}">
        <meta property="og:description" content="{{ $produk->meta_description }}">
    </x-slot>

    <x-slot name="subname">
        {{ $produk->name }}
    </x-slot>

    <div class="container mx-auto px-4 py-10">
        <div class="flex flex-col lg:flex-row items-center gap-10">
            {{-- Kanan: Gambar Produk --}}
            <div class="w-full lg:w-1/2">
                @if (!empty($produk->image))
                    <div class="overflow-hidden rounded-lg shadow">
                        <img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->name }}" class="w-full h-96 object-cover">
                    </div>
                @else
                    <div class="w-full h-96 flex items-center justify-center rounded-lg border">
                        <span class="text-gray-400">No Image</span>
                    </div>
                @endif
            </div>
            {{-- Kiri: Deskripsi dan Info Produk --}}
            <div class="w-full lg:w-1/2 space-y-6 text-left"> <!-- Menggunakan text-left untuk pastikan teks di kiri -->
                <h1 class="text-3xl font-bold text-primary">{{ $produk->name }}</h1>
                <p class="text-gray-700">{{ $produk->description }}</p>
                <div class="mt-4">
                    <p class="text-xl font-bold text-primary">
                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                    </p>
                    <p class="text-gray-600 mt-1">
                        Stok: <span class="font-semibold">{{ $produk->stock }}</span>
                    </p>

                    @if ($produk->sku)
                        <p class="text-gray-600">SKU: <span class="font-semibold">{{ $produk->sku }}</span></p>
                    @endif
                </div>
                {{-- Link Marketplace --}}
                <div class="flex flex-wrap gap-3 mt-6">
                    @if ($produk->shopee)
                        <a href="{{ $produk->shopee }}" target="_blank" class="px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600">Shopee</a>
                    @endif
                    @if ($produk->tokped)
                        <a href="{{ $produk->tokped }}" target="_blank" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Tokopedia</a>
                    @endif
                    @if ($produk->tiktokshop)
                        <a href="{{ $produk->tiktokshop }}" target="_blank" class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800">TikTok Shop</a>
                    @endif
                </div>
                {{-- Kategori --}}
                @if ($produk->kategoris && $produk->kategoris->count())
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold mb-2">Kategori:</h3>
                        <ul class="list-disc list-inside text-gray-700 text-sm">
                            @foreach ($produk->kategoris as $kategori)
                                <li>{{ $kategori->nama_kategori }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
    {{-- Menampilkan Produk Sejenis --}}
    @if ($produksejenis->count() > 0)
        <div class="mt-8">
            <h2 class="text-2xl font-bold text-primary">Produk Sejenis</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-6">
                @foreach ($produksejenis as $produk)
                    <div class="rounded-lg hover:overflow-y-hidden transition-transform transform md:px-10 hover:scale-105 overflow-hidden">
                        <img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->name }}" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <h3 class="flex items-center gap-2 text-xl font-bold">{{ $produk->name }}</h3>
                            <p class="text-sm mt-1 line-clamp-2 border-b pb-2 text-left">
                                {{ \Illuminate\Support\Str::limit($produk->description, 50) }}
                            </p>
                            <div class="flex items-center justify-between mt-2">
                                <p class="text-lg text-base-content font-bold text-left">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                                <a href="{{ route('landing.produk', $produk->slug) }}" class="bg-primary text-white px-4 py-2 rounded-lg shadow hover:bg-primary-dark transition">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

</x-landinglayouts>
