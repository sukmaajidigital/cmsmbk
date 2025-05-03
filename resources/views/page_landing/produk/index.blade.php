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
            <div class="min-w-screen h-36 bg-content items-center justify-center text-center">
                <h2 class="text-3xl font-bold">
                    {{ \App\Models\landing\LandingControllview::value('produk_title') }}
                </h2>
                <p class="mt-4 text-lg">{{ \App\Models\landing\LandingControllview::value('produk_subtitle') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-5 gap-6 md:px-10 mt-8">
                {{-- Sidebar kategori --}}
                {{-- Filter kategori produk --}}
                <div class="sm:col-span-6 md:col-span-2 lg:col-span-1">
                    {{-- Dropdown untuk Mobile (<768px) --}}
                    <div class="block sm:hidden px-4">
                        <select onchange="location = this.value;" class="w-full border border-gray-300 rounded-lg py-2 px-3 focus:outline-none focus:ring-2 focus:ring-primary">
                            <option value="{{ route('landing.indexproduk') }}" {{ request()->get('kategori') ? '' : 'selected' }}>
                                Semua Produk
                            </option>
                            @foreach ($produkkategoris as $kategori)
                                <option value="{{ route('landing.indexproduk', ['kategori' => $kategori->id]) }}" {{ request()->get('kategori') == $kategori->id ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Sidebar kategori untuk Tablet & Desktop --}}
                    <div class="hidden sm:block sticky top-24 bg-white p-4 rounded shadow text-left text-sm h-auto">
                        <h3 class="text-base font-semibold mb-4">Kategori Produk</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="{{ route('landing.indexproduk') }}" class="block {{ request()->get('kategori') ? '' : 'font-bold text-primary' }}">
                                    Semua Produk
                                </a>
                            </li>
                            @foreach ($produkkategoris as $kategori)
                                <li>
                                    <a href="{{ route('landing.indexproduk', ['kategori' => $kategori->id]) }}" class="block {{ request()->get('kategori') == $kategori->id ? 'font-bold text-primary' : '' }}">
                                        {{ $kategori->nama_kategori }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>


                {{-- Konten Produk --}}
                <div class="md:col-span-4">
                    <div id="produk-container">
                        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                            @forelse ($produks as $produk)
                                <div class="rounded-lg transition-transform transform hover:scale-105 overflow-hidden">
                                    <img src="{{ asset('storage/' . $produk->image) }}" alt="{{ $produk->name }}" class="w-full h-40 object-cover">
                                    <div class="p-4">
                                        <h3 class="text-xl font-bold">{{ $produk->name }}</h3>
                                        <p class="text-sm mt-1 line-clamp-2 border-b pb-2">
                                            {{ \Illuminate\Support\Str::limit($produk->description, 50) }}
                                        </p>
                                        <div class="flex justify-between items-center mt-2">
                                            <p class="text-lg font-bold text-left">
                                                {{-- Rp {{ number_format($produk->harga, 0, ',', '.') }} --}}
                                            </p>
                                            <a href="{{ route('landing.produk', $produk->slug) }}" class="bg-primary text-white px-4 py-2 rounded-lg shadow hover:bg-primary-dark transition">
                                                Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="col-span-4 text-center text-gray-500">Tidak ada produk pada kategori ini.</p>
                            @endforelse

                            <div class="col-span-full mt-6 flex justify-center">
                                {{ $produks->links('pagination::tailwind') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</x-landinglayouts>
