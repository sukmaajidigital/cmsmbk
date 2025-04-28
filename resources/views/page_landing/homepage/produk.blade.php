@if ($produks->count())
    <section class="min-w-full" id="produk">
        <div class="min-w-screen h-36 bg-content flex items-center justify-center">
            <h2 class="text-3xl font-bold">
                {{ \App\Models\landing\LandingControllview::value('produk_title') }}
            </h2>
        </div>
        <div id="produk-container">
            <div class="px-10 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 mt-6 gap-4 md:px-10">
                @foreach ($produks as $produk)
                    <div class="rounded-lg transition-transform transform hover:scale-105 overflow-hidden">
                        <img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->name }}" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <h3 class="flex items-center gap-2 text-xl font-bold">{{ $produk->name }}</h3>
                            <p class="text-sm mt-1 line-clamp-2 border-b pb-2 text-left">
                                {{ \Illuminate\Support\Str::limit($produk->description, 50) }}
                            </p>
                            <div class="flex items-center justify-between mt-2">
                                <p class="text-lg text-base-content font-bold text-left">
                                    Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                </p>
                                <a href="{{ route('landing.produk', $produk->slug) }}" class="bg-primary text-white px-4 py-2 rounded-lg shadow hover:bg-primary-dark transition">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
