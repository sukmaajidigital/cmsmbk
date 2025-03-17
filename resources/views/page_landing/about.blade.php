<x-landinglayouts>
    <div class="hero bg-base-200 ">
        <div class="hero-content flex-col lg:flex-row-reverse">
            <div class="text-center lg:text-left">
                <h1 class="text-5xl font-bold">History!</h1>
                <p class="py-6">
                    {{ $landingabout->deskripsi }}
                </p>
            </div>
            <div class="card w-full max-w-sm shrink-0 ">
                <div class="card-body">
                    <img src="{{ asset('storage/' . $landingmain->logo) }}" alt="Tentang Muria Batik" class="rounded-2xl w-full">
                </div>
            </div>
        </div>
    </div>
</x-landinglayouts>
