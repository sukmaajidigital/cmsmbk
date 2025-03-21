<section class="min-w-screen min-h-screen py-16 px-6 md:px-10   text-center bg-opacity-40 mt-25">
    <h2 class="text-3xl font-bold">Proses Membatik?</h2>
    <p class="mt-4 text-lg">Dibuat dengan bahan premium dan sentuhan seni terbaik dari pengrajin Indonesia</p>
    <div class="w-full mt-6 relative flex items-center justify-center">
        <!-- Tombol kiri -->
        <button id="prevBtn" class="left-0 z-10 p-2 text-black rounded-full">❮</button>
        <!-- Container gambar -->
        <div class="w-[60%] h-[40vh] overflow-hidden">
            <div id="carousel" class="flex transition-transform duration-300 ease-in-out">
                @for ($i = 1; $i <= 6; $i++)
                    <div class="shrink-0 w-1/3 px-4 flex flex-col items-center transition-transform duration-300 ease-in-out hover:scale-110 group">
                        <div class="w-40 h-60 bg-cover bg-center" style="background-image: url('https://muriabatikkudus.com/wp-content/uploads/2024/05/1.png');">
                        </div>
                        <p class="mt-2 text-black opacity-0 group-hover:opacity-95 transition-opacity duration-300">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus modi eligendi rerum at aliquid error ratione voluptates quos excepturi animi ut assumenda, exercitationem quaerat voluptas distinctio autem. Quis, perferendis aperiam! {{ $i }}</p>
                    </div>
                @endfor
            </div>
        </div>
        <!-- Tombol kanan -->
        <button id="nextBtn" class="right-0 z-10 p-2 text-blacke rounded-full">❯</button>
    </div>

    <script>
        const carousel = document.getElementById('carousel');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const items = carousel.children;
        const visibleItems = 3;
        let index = 0;

        function updateCarousel() {
            index = Math.max(0, Math.min(index, items.length - visibleItems));
            carousel.style.transform = `translateX(-${index * (100 / visibleItems)}%)`;
        }

        prevBtn.addEventListener('click', () => {
            if (index > 0) {
                index--;
                updateCarousel();
            }
        });

        nextBtn.addEventListener('click', () => {
            if (index < items.length - visibleItems) {
                index++;
                updateCarousel();
            }
        });

        updateCarousel();
    </script>

    <br>
    <div class="mt-20 relative w-screen h-[30vh] overflow-hidden"> <!-- Container dengan rasio 10x3 -->
        <iframe class="absolute top-0 left-0 w-full h-full scale-[4] origin-center object-cover" src="https://www.youtube.com/embed/x78BkJyhz74?autoplay=1&controls=0&rel=0&loop=1&mute=1&playsinline=1&playlist=x78BkJyhz74&enablejsapi=1&origin=https%3A%2F%2Fmuriabatikkudus.com&widgetid=1&forigin=https%3A%2F%2Fmuriabatikkudus.com%2F&aoriginsup=1&vf=1" title="YouTube video player" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
</section>
