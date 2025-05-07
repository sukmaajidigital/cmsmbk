<footer class="footer bg-base p-10">
    <form class="gap-6">
        <div class="flex items-center gap-2 text-xl font-bold">
            <img src="{{ asset('storage/' . \App\Models\landing\LandingMain::value('logo')) }}" alt="logo" class="w-20 h-10 object-contain">
            <span>{{ \App\Models\landing\LandingMain::value('longname') }}</span>
        </div>
        <p>@copyright {{ date('Y') }} - {{ \App\Models\landing\LandingMain::value('longname') }}</p>

    </form>
    <nav class="text-base-content">
        <h6 class="footer-title">Navigasi</h6>
        <a href="{{ url('/') }}" class="link link-hover">Beranda</a>
        <a href="{{ route('landing.indexproduk') }}" class="link link-hover">Produk</a>
        <a href="{{ route('landing.indexblog') }}" class="link link-hover">Blog</a>
        <a href="{{ route('landing.contact') }}" class="link link-hover">Kontak</a>
    </nav>
    <nav class="text-base-content">
        <h6 class="footer-title">Akun</h6>
        <a href="{{ route('login') }}" class="link link-hover">Login</a>
        <a href="{{ route('logout') }}" class="link link-hover">Logout</a>
    </nav>
    <nav class="text-base-content">
        <h6 class="footer-title">Legal</h6>
        <a href="#" class="link link-hover">Kebijakan Privasi</a>
        <a href="#" class="link link-hover">Syarat & Ketentuan</a>
        <a href="#" class="link link-hover">Kebijakan Cookie</a>
    </nav>
</footer>
