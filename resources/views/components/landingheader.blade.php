<div class="sticky top-0 z-50 bg-base-100 shadow">
    <nav class="navbar rounded-box">
        <div class="navbar-start">
            <div class="flex items-center gap-2">
                <img src="{{ asset('storage/' . \App\Models\landing\LandingMain::value('logo')) }}" alt="logo" class="w-10 h-10 object-contain">
            </div>
        </div>
        <div class="navbar-center max-md:hidden">
            <ul class="menu menu-horizontal gap-2 p-0 text-base rtl:ml-20">
                <li>
                    <a href="{{ route('landing.homepage') }}" class="{{ request()->routeIs('landing.homepage') ? 'bg-primary text-white' : '' }}">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('landing.indexproduk') }}" class="{{ request()->routeIs('landing.indexproduk') ? 'bg-primary text-white' : '' }}">
                        Produk
                    </a>
                </li>
                <li>
                    <a href="{{ route('landing.about') }}" class="{{ request()->routeIs('landing.about') ? 'bg-primary text-white' : '' }}">
                        About
                    </a>
                </li>
                <li>
                    <a href="{{ route('landing.contact') }}" class="{{ request()->routeIs('landing.contact') ? 'bg-primary text-white' : '' }}">
                        Contact
                    </a>
                </li>
                <li>
                    <a href="{{ route('landing.indexblog') }}" class="{{ request()->routeIs('landing.indexblog') ? 'bg-primary text-white' : '' }}">
                        Blog
                    </a>
                </li>
            </ul>
        </div>
        <div class="navbar-end items-center gap-4">
            <div class="dropdown relative inline-flex md:hidden rtl:[--placement:bottom-end]">
                <button id="dropdown-default" type="button" class="dropdown-toggle btn btn-text btn-secondary btn-square" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    <span class="icon-[tabler--menu-2] dropdown-open:hidden size-5"></span>
                    <span class="icon-[tabler--x] dropdown-open:block hidden size-5"></span>
                </button>
                <ul class="dropdown-menu dropdown-open:opacity-100 hidden min-w-60" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-default">
                    <li>
                        <a href="{{ route('landing.homepage') }}" class="{{ request()->routeIs('landing.homepage') ? 'bg-primary text-white' : '' }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('landing.indexproduk') }}" class="{{ request()->routeIs('landing.indexproduk') ? 'bg-primary text-white' : '' }}">
                            Produk
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('landing.about') }}" class="{{ request()->routeIs('landing.about') ? 'bg-primary text-white' : '' }}">
                            About
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('landing.contact') }}" class="{{ request()->routeIs('landing.contact') ? 'bg-primary text-white' : '' }}">
                            Contact
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('landing.indexblog') }}" class="{{ request()->routeIs('landing.indexblog') ? 'bg-primary text-white' : '' }}">
                            Blog
                        </a>
                    </li>
                </ul>
            </div>
            <a class="btn btn-primary" href="#">Login</a>
        </div>
    </nav>
</div>
