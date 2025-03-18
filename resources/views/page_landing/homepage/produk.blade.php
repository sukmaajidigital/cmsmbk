<section class="min-w-full" id="produk">
    <div class="min-w-screen h-36 bg-base-content flex items-center justify-center">
        <h2 class="text-3xl font-bold text-white">Koleksi Batik Terbaru</h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 mt-6 gap-4 md:px-10">
        @for ($i = 1; $i <= 6; $i++)
            <div class="rounded-lg hover:shadow-md transition-transform transform md:px-10 hover:scale-105 overflow-hidden">
                <img src="https://muriabatikkudus.com/wp-content/uploads/2024/07/2.jpg" alt="Batik" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="flex items-center gap-2 text-xl font-bold">Nama Produk</h3>
                    <p class="text-sm mt-1 line-clamp-2 border-b pb-2 text-left">
                        Deskripsi produk. Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid cumque iste velit ducimus omnis voluptatibus necessitatibus asperiores dolor.
                    </p>
                    <div class="flex items-center justify-between mt-2">
                        <p class="text-lg text-base-content font-bold text-left">Rp 11.200.000</p>
                        <button class="bg-primary text-white px-4 py-2 rounded-lg shadow hover:bg-primary-dark transition">Detail</button>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</section>
