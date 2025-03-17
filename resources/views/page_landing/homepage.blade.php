<x-landinglayouts>
    <div class="w-full rounded-lg overflow-hidden">
        @if (!empty($landingmain->logo))
            <img src="{{ asset('storage/' . $landingmain->logo) }}" alt="" class="h-40 object-cover rounded-lg w-full">
        @else
            <div class=" flex items-center justify-center  rounded-lg border">
                <span class="text-secondary">No Image</span>
            </div>
        @endif
    </div>
    <h1 class="text-4xl font-extrabold text-primary">Selamat Datang di {{ $landingmain->longname }}</h1>
    <p class=" text-lg text-secondary">Menawarkan batik berkualitas dengan desain eksklusif.</p>
    <a class="btn btn-lg btn-primary" href="#">Jelajahi Koleksi</a>
</x-landinglayouts>
