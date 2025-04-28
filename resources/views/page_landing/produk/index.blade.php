<x-landinglayouts>
    <x-slot name="meta">
        <meta name="keywords" content="{{ \App\Models\landing\LandingControllview::value('produk_title') }}">
        <meta name="author" content="admin">
        <meta name="description" content="{{ \App\Models\landing\LandingControllview::value('produk_subtitle') }}">
        <meta name="twitter:title" content="{{ \App\Models\landing\LandingControllview::value('produk_title') }}">
        <meta name="twitter:description" content="{{ \App\Models\landing\LandingControllview::value('produk_subtitle') }}">
        <meta name="twitter:image" content="{{ asset('storage/' . $produks->first()->image) }}">
        <meta property="og:image" content="{{ asset('storage/' . $produks->first()->image) }}">
        <meta property="og:description" content="{{ \App\Models\landing\LandingControllview::value('produk_subtitle') }}">
    </x-slot>
    <x-slot name="subname">
        {{ \App\Models\landing\LandingControllview::value('produk_title') }}
    </x-slot>
    @if ($produks->count())
        <section class="min-w-full" id="produk">
            <div class="min-w-screen h-36 bg-content items-center justify-center">
                <h2 class="text-3xl font-bold">
                    {{ \App\Models\landing\LandingControllview::value('produk_title') }}
                </h2>
                <br>
                <p class="mt-4 text-lg">{{ \App\Models\landing\LandingControllview::value('produk_subtitle') }}</p>
            </div>
            <div id="produk-container">
                <div class="px-1 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 mt-6 gap-4  md:px-10">
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
                    <div class="col-span-1 sm:col-span-2 md:col-span-4 mt-6 flex justify-center">
                        {{ $produks->links('pagination::tailwind') }}
                    </div>
                </div>
            </div>
        </section>
    @endif
</x-landinglayouts>
