<div class="">
    <nav class="navbar rounded-box">
        <div class="navbar-start">
            <div class="flex items-center gap-2">
                <img src="{{ asset('storage/' . \App\Models\landing\LandingMain::value('logo')) }}" alt="logo" class="w-10 h-10 object-contain">
                {{-- <a class="link text-base-content link-neutral text-xl no-underline" href="{{ route('landing.homepage') }}">
                    {{ \App\Models\landing\LandingMain::value('longname') }}
                </a> --}}
            </div>
        </div>
        <div class="navbar-center max-md:hidden">
            <ul class="menu menu-horizontal gap-2 p-0 text-base rtl:ml-20">
                {{-- <li class="dropdown relative inline-flex [--auto-close:inside] [--offset:9] [--placement:bottom-end] max-md:[--placement:bottom]">
                    <button id="dropdown-end" type="button" class="dropdown-toggle dropdown-open:bg-base-content/10 dropdown-open:text-base-content max-md:px-2" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        Products
                        <span class="icon-[tabler--chevron-down] dropdown-open:rotate-180 size-4"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-open:opacity-100 hidden w-48" role="menu" aria-orientation="vertical" aria-labelledby="nested-dropdown">
                        <li><a class="dropdown-item" href="#">Templates</a></li>
                        <li><a class="dropdown-item" href="#">UI kits</a></li>
                    </ul>
                </li> --}}
                <li><a href="{{ route('landing.homepage') }}">Home</a></li>
                <li><a href="{{ route('landing.indexproduk') }}">Produk</a></li>
                <li><a href="{{ route('landing.about') }}">About</a></li>
                <li><a href="{{ route('landing.contact') }}">Contact</a></li>
                <li><a href="{{ route('landing.indexblog') }}">Blog</a></li>
            </ul>
        </div>
        <div class="navbar-end items-center gap-4">
            <div class="dropdown relative inline-flex md:hidden rtl:[--placement:bottom-end]">
                <button id="dropdown-default" type="button" class="dropdown-toggle btn btn-text btn-secondary btn-square" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    <span class="icon-[tabler--menu-2] dropdown-open:hidden size-5"></span>
                    <span class="icon-[tabler--x] dropdown-open:block hidden size-5"></span>
                </button>
                <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-default">
                    {{-- <li class="dropdown relative [--auto-close:inside] [--offset:9] [--placement:bottom-end] max-md:[--placement:bottom]">
                        <button id="dropdown-end-2" class="dropdown-toggle dropdown-item dropdown-open:bg-base-content/10 dropdown-open:text-base-content justify-between" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            Products
                            <span class="icon-[tabler--chevron-right] size-4 rtl:rotate-180"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-open:opacity-100 hidden w-48" role="menu" aria-orientation="vertical" aria-labelledby="nested-dropdown">
                            <li><a class="dropdown-item" href="#">Templates</a></li>
                            <li><a class="dropdown-item" href="#">UI kits</a></li>
                        </ul>
                    </li> --}}
                    <li><a href="{{ route('landing.homepage') }}">Home</a></li>
                    <li><a href="{{ route('landing.indexproduk') }}">Produk</a></li>
                    <li><a href="{{ route('landing.about') }}">About</a></li>
                    <li><a href="{{ route('landing.contact') }}">Contact</a></li>
                    <li><a href="{{ route('landing.indexblog') }}">Blog</a></li>
                </ul>
            </div>
            <a class="btn btn-primary" href="#">Login</a>
        </div>
    </nav>
</div>
