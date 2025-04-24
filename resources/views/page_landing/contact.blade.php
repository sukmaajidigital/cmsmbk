<x-landinglayouts>
    <div class="hero bg-white shadow-md rounded-lg p-6 md:w-4/5 lg:w-3/5 mx-auto">
        <h2 class="text-2xl font-bold text-center mb-6">Kontak Kami</h2>
        <div class="hero-content flex flex-col lg:flex-row lg:space-x-8 items-start">
            <div class="flex-1 mb-4">
                <h4 class="font-semibold text-lg">Telepon</h4>
                <p class="text-gray-700">{{ $landingcontact->telepon ?? '-' }}</p>
            </div>
            <div class="flex-1 mb-4">
                <h4 class="font-semibold text-lg">Alamat</h4>
                <p class="text-gray-700">{{ $landingcontact->alamat ?? '-' }}</p>
            </div>
            <div class="flex-1 mb-4">
                <h4 class="font-semibold text-lg">Email</h4>
                <p class="text-gray-700">{{ $landingcontact->email ?? '-' }}</p>
            </div>
        </div>

        <!-- Maps -->
        <div class="mt-6">
            @if ($landingcontact->maps)
                <div class="aspect-w-16 aspect-h-9">
                    <iframe src="{{ $landingcontact->maps }}" class="w-full h-52 rounded-lg border border-gray-300" frameborder="0" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            @else
                <p class="text-gray-500 text-center">Peta belum tersedia.</p>
            @endif
        </div>
    </div>
</x-landinglayouts>
