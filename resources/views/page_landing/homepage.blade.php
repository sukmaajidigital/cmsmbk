<x-landinglayoutshomepage>

    <x-slot name="meta">
        <meta name="keywords" content="{{ $landingmain->longname }}">
        <meta name="author" content="{{ $landingmain->longname }}">
        <meta name="description" content="{{ $landingmain->longname }}">
    </x-slot>
    <x-slot name="subname">
        Home
    </x-slot>
    <section class="relative w-screen h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('{{ asset('storage/' . \App\Models\landing\LandingControllview::value('hero_image')) }}');">
        <div class="w-screen h-screen flex flex-col items-center justify-center bg-base-content bg-opacity-50 p-10 text-center text-white rounded-lg">
            <img src="{{ asset('storage/' . \App\Models\landing\LandingMain::value('logo')) }}" alt="logo" aria-placeholder="logo" class="w-40 object-cover md:w-48 mb-7">
            <h1 class="text-5xl font-bold">{{ \App\Models\landing\LandingControllview::value('hero_tagline') }}</h1>
            <p class="mt-4 text">{{ \App\Models\landing\LandingControllview::value('hero_subtagline') }}</p>
            <button class="mt-6 px-6 py-3 bg-primary text-white rounded-full text-lg">{{ \App\Models\landing\LandingControllview::value('hero_button') }}</button>
            <nav class="navbar rounded-box bg-transparent flex justify-center mt-25">
                <div class="navbar-center bg-transparent">
                    <ul class="menu menu-horizontal gap-2 p-0 bg-transparent font-semibold">
                        <li class="bg-transparent hover:bg-base-100 rounded-full"><a href="{{ route('landing.about') }}" class="text-white hover:text-black">Product</a></li>
                        <li class="bg-transparent hover:bg-base-100 rounded-full"><a href="{{ route('landing.about') }}" class="text-white hover:text-black">About</a></li>
                        <li class="bg-transparent hover:bg-base-100 rounded-full"><a href="{{ route('landing.contact') }}" class="text-white hover:text-black">Contact</a></li>
                    </ul>
                </div>
            </nav>
            <a href="#proses" class="animate-bounce left-1/2 transform -translate-x-1/2 mt-40" onclick="event.preventDefault(); document.querySelector('#proses').scrollIntoView({ behavior: 'smooth' });">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 9l6 6l6-6" />
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 9l6 6l6-6" />
                </svg>
            </a>
        </div>
    </section>
    {{-- proses membatik --}}
    <div id="proses" class="overflow-y-hidden overflow-x-hidden">
        @include('page_landing.homepage.prosesmembatik')
    </div>
    <div id="produk" class="overflow-y-hidden">
        @include('page_landing.homepage.produk')
    </div>

</x-landinglayoutshomepage>
