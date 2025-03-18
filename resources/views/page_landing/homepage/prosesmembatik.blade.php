<section class="min-w-screen min-h-screen py-16 px-6 md:px-10   text-center bg-opacity-40 mt-25">
    <h2 class="text-3xl font-bold">Proses Membatik?</h2>
    <p class="mt-4 text-lg">Dibuat dengan bahan premium dan sentuhan seni terbaik dari pengrajin Indonesia</p>
    <div class="mt-6 flex flex-wrap justify-center gap-6">
        <!-- Looping 7 kali -->
        @for ($i = 1; $i <= 6; $i++)
            <div class="relative w-40 h-40 bg-cover bg-center" style="background-image: url('https://muriabatikkudus.com/wp-content/uploads/2024/05/1.png');">
            </div>
        @endfor
    </div>
    <br>
    <div class="mt-10 w-full relative pointer-events-none" style="height: 80vh; overflow: hidden;">
        <iframe class="absolute top-0 left-0 w-full h-[80%]" src="https://www.youtube.com/embed/x78BkJyhz74?autoplay=1&controls=0&rel=0&loop=1&mute=1&playsinline=1&playlist=x78BkJyhz74&enablejsapi=1&origin=https%3A%2F%2Fmuriabatikkudus.com&widgetid=1&forigin=https%3A%2F%2Fmuriabatikkudus.com%2F&aoriginsup=1&vf=1" title="YouTube video player" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
        </iframe>
    </div>
</section>
