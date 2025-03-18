<x-landinglayouts>
    <div class="hero bg-base md:w-4/5 lg:w-4/5 mx-auto">
        <div class="hero-content flex-col lg:flex-row-reverse items-center">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold"></h1>
                <p class="first-letter:text-base-content text-justify first-letter:float-left first-letter:me-3 first-letter:text-7xl first-letter:font-bold first-line:uppercase first-line:tracking-widest">
                    HHistory! {{ $landingabout->deskripsi }}
                </p>
            </div>
            <div class="w-full max-w-sm mx-auto mt-13">
                <div class="">
                    <img src="{{ asset('storage/' . $landingmain->logo) }}" alt="Tentang Muria Batik" class="">
                </div>
            </div>
        </div>
    </div>
</x-landinglayouts>
