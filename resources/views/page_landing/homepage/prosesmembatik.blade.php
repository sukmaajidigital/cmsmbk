<section class="min-w-screen min-h-screen py-16 text-center bg-opacity-40 mt-10">
    <h2 class="text-3xl font-bold">{{ \App\Models\landing\LandingControllview::value('proses_title') }}</h2>
    <p class="mt-4 text-lg">{{ \App\Models\landing\LandingControllview::value('proses_subtitle') }}</p>

    <div class="w-full mt-6 relative flex items-center justify-center">
        <!-- Tombol kiri -->
        <button id="prevBtn" class="left-0 z-10 p-2 text-black rounded-full">❮</button>

        {{-- Container gambar --}}

        {{-- Container gambar dengan lebar 90% pada ukuran layar kecil (sm),
            80% pada ukuran layar medium (md), dan 60% pada ukuran layar besar (lg)
            Tinggi container adalah 40vh (40% dari tinggi viewport) --}}

        <div class="w-[90%] md:w-[80%] lg:w-[60%] h-[45vh] overflow-hidden">
            <div id="carousel" class="flex transition-transform duration-300 ease-in-out">
                @foreach ($landingproses as $proses)
                    <div class="carousel-item shrink-0 px-4 flex flex-col items-center transition-transform duration-300 ease-in-out hover:scale-110 group">
                        <div class="w-40 h-60 bg-cover bg-center" style="background-image: url('{{ asset('storage/' . $proses->imageproses ?? 'https://via.placeholder.com/150') }}');">
                        </div>
                        {{-- remove opacity on hover opacity-0 group-hover:opacity-95  --}}
                        <p class="mt-2 text-black font-bold text-sm text-center transition-opacity duration-300">{{ $proses->judul ?? 'kosong' }}</p>
                        <p class="mt-2 text-black text-sm text-center transition-opacity duration-300">
                            {{ Str::limit($proses->deskripsi ?? 'kosong', 100) }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- Tombol kanan -->
        <button id="nextBtn" class="right-0 z-10 p-2 text-black rounded-full">❯</button>
    </div>
    <script>
        const carousel = document.getElementById('carousel');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const items = document.querySelectorAll('.carousel-item');

        let index = 0;
        let visibleItems = getVisibleItems();

        // Set lebar item secara dinamis
        function setItemWidths() {
            visibleItems = getVisibleItems();
            const itemWidth = 100 / visibleItems;
            items.forEach(item => {
                item.style.width = itemWidth + '%';
            });
            updateCarousel();
        }

        function getVisibleItems() {
            const width = window.innerWidth;
            if (width < 768) return 1; // Mobile
            else if (width < 1024) return 2; // Tablet
            else return 3; // Desktop
        }

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

        window.addEventListener('resize', setItemWidths);
        setItemWidths(); // Init
    </script>
    <br>
    <div class="mt-20 relative w-screen h-[30vh] overflow-hidden"> <!-- Container dengan rasio 10x3 -->
        <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay muted loop playsinline>
            <source src="{{ optional($landingvidio)->vidio ? asset('storage/' . $landingvidio->vidio) : 'https://via.placeholder.com/150' }}" type="video/mp4">
        </video>
    </div>
</section>
