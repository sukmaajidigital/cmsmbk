@if ($produks->count())
    <section class="min-w-full" id="produk">
        <div class="min-w-screen h-36 bg-content flex items-center justify-center">
            <h2 class="text-3xl font-bold">
                {{ \App\Models\landing\LandingControllview::value('produk_title') }}
            </h2>
        </div>
        <div id="produk-container">
            <!-- Desktop: 8 produk -->
            <div class="hidden md:grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 px-10 mt-6">
                @foreach ($produks->take(8) as $produk)
                    @include('page_landing.homepage.produkdt', ['produk' => $produk])
                @endforeach
            </div>

            <!-- Tablet: 4 produk -->
            <div class="hidden sm:grid md:hidden grid-cols-1 sm:grid-cols-2 gap-4 px-6 mt-6">
                @foreach ($produks->take(4) as $produk)
                    @include('page_landing.homepage.produkdt', ['produk' => $produk])
                @endforeach
            </div>

            <!-- Mobile: 3 produk -->
            <div class="grid sm:hidden grid-cols-1 gap-4 px-4 mt-6">
                @foreach ($produks->take(3) as $produk)
                    @include('page_landing.homepage.produkdt', ['produk' => $produk])
                @endforeach
            </div>

            <!-- Tombol Lihat Lainnya -->
            <div class="text-right mt-6 px-10">
                <a href="{{ route('landing.indexproduk') }}" class="inline-block bg-primary text-white px-6 py-2 rounded-lg shadow hover:bg-primary-dark transition justify-end">
                    Lihat Produk Lainnya
                </a>
            </div>
        </div>
    </section>
@endif
