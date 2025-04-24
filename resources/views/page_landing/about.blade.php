<x-landinglayouts>
    <x-slot name="meta">
        <meta name="keywords" content="{{ \App\Models\landing\LandingControllview::value('hero_subtagline') }}, {{ $landingmain->longname }}, {{ $landingmain->shortname }}">
        <meta name="author" content="admin">
        <meta name="description" content="{{ Str::limit($landingabout->deskripsi, 200) }}">
        <meta name="twitter:title" content="About {{ $landingmain->longname }}">
        <meta name="twitter:description" content="{{ Str::limit($landingabout->deskripsi, 200) }}">
        <meta name="twitter:image" content="{{ asset('storage/' . $landingabout->imageabout) }}">
        <meta property="og:image" content="{{ asset('storage/' . $landingabout->imageabout) }}">
        <meta property="og:description" content="{{ Str::limit($landingabout->deskripsi, 200) }}">
    </x-slot>
    <x-slot name="subname">
        About
    </x-slot>
    <div class="hero bg-base md:w-4/5 lg:w-3/5 mx-auto">
        <div class="hero-content flex-col lg:flex-row-reverse items-center">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold"></h1>
                <p class="first-letter:text-base-content text-justify first-letter:float-left first-letter:me-3 first-letter:text-7xl first-letter:font-bold first-line:uppercase first-line:tracking-widest">
                    HHistory! {{ $landingabout->deskripsi }}
                </p>
            </div>
            <div class="w-full rounded-lg overflow-hidden mt-5">
                @if (!empty($landingabout->imageabout))
                    <img src="{{ asset('storage/' . $landingabout->imageabout) }}" alt="" class="h-40 object-cover rounded-lg w-full">
                @else
                    <div class="w-40 h-40 flex items-center justify-center  rounded-lg border">
                        <span class="text-secondary">No Image</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-landinglayouts>
