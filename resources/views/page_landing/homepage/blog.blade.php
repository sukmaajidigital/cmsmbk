@if ($blogs->count())
    <section class="min-w-full" id="blog">
        <div class="min-w-screen h-36 bg-content flex items-center justify-center">
            <h2 class="text-3xl font-bold">
                New Post
            </h2>
        </div>
        <div id="blog-container">
            <!-- Desktop: tampilkan 8 blog -->
            <div class="hidden md:grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 px-10 mt-6">
                @foreach ($blogs->take(8) as $blog)
                    @include('page_landing.homepage.blogdt', ['blog' => $blog])
                @endforeach
            </div>

            <!-- Tablet: tampilkan 4 blog -->
            <div class="hidden sm:grid md:hidden grid-cols-1 sm:grid-cols-2 gap-4 px-6 mt-6">
                @foreach ($blogs->take(4) as $blog)
                    @include('page_landing.homepage.blogdt', ['blog' => $blog])
                @endforeach
            </div>

            <!-- Mobile: tampilkan 3 blog -->
            <div class="grid sm:hidden grid-cols-1 gap-4 px-4 mt-6">
                @foreach ($blogs->take(3) as $blog)
                    @include('page_landing.homepage.blogdt', ['blog' => $blog])
                @endforeach
            </div>

            <!-- Tombol Lihat Lainnya -->
            <div class="text-right mt-6 px-10">
                <a href="{{ route('landing.indexblog') }}" class="inline-block bg-primary text-white px-6 py-2 rounded-lg shadow hover:bg-primary-dark transition">
                    Lihat Post Lainnya
                </a>
            </div>
        </div>

    </section>
@endif
