<x-landinglayouts>
    <x-slot name="meta">
        <title>{{ $produk->meta_title ?? ($produk->title ?? '') }}</title>
        <meta name="description" content="{{ $produk->meta_description }}">
        <meta name="keywords" content="{{ $produk->meta_keywords ?? '' }}">
        <meta name="author" content="{{ $produk->user->name ?? 'Admin' }}">
        <meta name="keyphrases" content="{{ $produk->meta_keywords ?? '' }}">
        <meta name="classification" content="{{ $produk->meta_keywords ?? '' }}">
        <link rel="canonical" href="{{ url()->current() }}">
        <meta http-equiv="Pragma" content="no-cache">
        <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">

        <meta property="og:type" content="article">
        <meta property="og:site_name" content="{{ config('app.name', '') }}">
        <meta property="og:locale" content="id_ID">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="{{ $produk->og_title ?? ($produk->title ?? '') }}">
        <meta property="og:description" content="{{ $produk->og_description ?? Str::limit(strip_tags($produk->content ?? ''), 150) }}">
        <meta property="og:image" content="{{ $produk->image ? asset('storage/' . $produk->image) : asset('default-og-image.jpg') }}">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:site" content="">
        <meta name="twitter:creator" content="">
        <meta name="twitter:url" content="{{ url()->current() }}">
        <meta name="twitter:title" content="{{ $produk->meta_title ?? ($produk->title ?? '') }}">
        <meta name="twitter:description" content="{{ $produk->meta_description ?? Str::limit(strip_tags($produk->content ?? ''), 150) }}">
        <meta name="twitter:image" content="{{ $produk->image ? asset('storage/' . $produk->image) : asset('default-og-image.jpg') }}">
    </x-slot>

    <x-slot name="subname">
        {{ $produk->name }}
    </x-slot>

    <div class="container mx-auto px-4 py-10">
        <div class="flex flex-col lg:flex-row items-start gap-10">
            {{-- Kiri: Gambar Produk dan Galeri Variasi --}}
            <div class="w-full lg:w-2/5">
                <div class="overflow-hidden rounded-lg shadow aspect-square bg-white">
                    <img id="main-image" src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->name }}" class="w-full h-full object-contain">
                </div>
                {{-- Galeri Gambar Variasi --}}
                @if ($produk->variasi && $produk->variasi->count())
                    <div class="flex gap-4 mt-4 overflow-x-auto">
                        @foreach ($produk->variasi as $variasi)
                            <img src="{{ asset('storage/' . $variasi->image) }}" alt="{{ $variasi->nama_variasi }}" class="w-20 h-20 object-cover rounded cursor-pointer border-2 hover:border-primary" onclick="setMainImage('{{ asset('storage/' . $variasi->image) }}')">
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Kanan: Deskripsi dan Info Produk --}}
            <div class="w-full lg:w-1/2 space-y-6 text-left">
                <h1 class="text-3xl font-bold text-primary">{{ $produk->name }}</h1>
                <p class="text-gray-700">{{ $produk->description }}</p>
                <div class="mt-4">
                    {{-- <p class="text-xl font-bold text-primary">
                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                    </p> --}}
                    {{-- <p class="text-gray-600 mt-1">
                        Stok: <span class="font-semibold">{{ $produk->stock }}</span>
                    </p> --}}
                    {{-- @if ($produk->sku)
                        <p class="text-gray-600">SKU: <span class="font-semibold">{{ $produk->sku }}</span></p>
                    @endif --}}
                </div>

                {{-- Pilihan Variasi dalam bentuk tombol --}}
                @if ($produk->variasi && $produk->variasi->count())
                    <div class="mt-6">
                        <h3 class="text-lg font-semibold mb-2">Pilih Variasi:</h3>
                        <div id="variasi-buttons" class="flex flex-wrap gap-2">
                            @foreach ($produk->variasi as $index => $variasi)
                                <button type="button" class="px-4 py-2 border rounded transition" onclick="selectVariasi(this, '{{ asset('storage/' . $variasi->image) }}')">
                                    {{ $variasi->nama_variasi }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Link Marketplace --}}
                <div class="flex flex-wrap gap-3 mt-6">
                    <a href="https://wa.me/{{ $landingcontact->telepon ?? '-' }}/?text=Saya%20ingin%20menanyakan%20tentang%20produk%20{{ $produk->name }}" target="_blank" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Whatsapp</a>
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
    <script>
        function setMainImage(imageUrl) {
            const mainImage = document.getElementById('main-image');
            mainImage.src = imageUrl;
        }

        function selectVariasi(button, imageUrl) {
            // Reset semua button
            const buttons = document.querySelectorAll('#variasi-buttons button');
            buttons.forEach(btn => {
                btn.classList.remove('bg-primary', 'text-white');
            });

            // Aktifkan button yang diklik
            button.classList.add('bg-primary', 'text-white');

            // Set gambar utama
            setMainImage(imageUrl);
        }
    </script>
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
                                <p class="text-lg text-base-content font-bold text-left">
                                    {{-- Rp {{ number_format($produk->harga, 0, ',', '.') }} --}}
                                </p>
                                <a href="{{ route('landing.produk', $produk->slug) }}" class="bg-primary text-white px-4 py-2 rounded-lg shadow hover:bg-primary-dark transition">Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

</x-landinglayouts>
