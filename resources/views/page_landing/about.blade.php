<x-landinglayouts>
    <section class="bg-base-100 py-16">
        <div class="container mx-auto px-6 lg:px-20">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-primary">About Muria Batik</h1>
                <p class="text-lg text-neutral mt-4">Muria Batik Kudus adalah brand batik premium yang mengangkat keindahan budaya lokal dengan sentuhan modern.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 ">
                <div>
                    <img src="{{ asset('storage/' . $landingmain->logo) }}" alt="Tentang Muria Batik" class="rounded-2xl w-full">
                </div>
                <div>
                    <h2 class="text-3xl font-semibold text-secondary">History</h2>
                    <p class="mt-4 text-wrap">
                        {{ $landingabout->deskripsi }}
                    </p>
                    <ul class="mt-6 space-y-4">
                        <li class="flex items-center gap-3">
                            <span class="icon-[tabler--check] text-success size-6"></span>
                            <span class="text-lg text-neutral">Desain Eksklusif</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="icon-[tabler--check] text-success size-6"></span>
                            <span class="text-lg text-neutral">Kualitas Premium</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <span class="icon-[tabler--check] text-success size-6"></span>
                            <span class="text-lg text-neutral">Berdaya Saing Global</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</x-landinglayouts>
