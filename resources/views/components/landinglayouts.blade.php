<!doctype html>
<html lang="en" data-theme="{{ \App\Models\landing\LandingMain::value('data_theme') }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SEO Meta Tags -->
    <meta name="title" content="{{ \App\Models\Setting::value('app_name') }}">
    <meta name="description" content="Sistem dashboard admin yang membantu Anda mengelola apapun.">
    <meta name="keywords" content="stok barang, manajemen stok, manajemen pelanggan, nomor surat">
    <meta name="author" content="Muria Batik Kudus">
    <meta name="robots.txt" content="index, follow">

    <!-- Favicon -->
    <title>{{ \App\Models\landing\LandingMain::value('longname') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('storage/' . \App\Models\landing\LandingMain::value('icon')) }}" />

    <!-- Stylesheets -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('assets/datatable/datatable.css') }}" />
</head>

<body class="bg-base-100 text-base-content">
    <main>
        <div class="h-screen flex flex-col">
            <!-- Navbar -->
            <x-landingheader />
            <!-- Hero Section -->
            <section class="flex-1 flex flex-col items-center  text-center p-10">
                {{ $slot }}
            </section>
            <x-landingfooter />
        </div>
    </main>

    @vite('resources/js/app.js')
    <script src="{{ asset('assets/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/datatable/datatable.min.js') }}"></script>
    @stack('script')
    @stack('componentscript')
</body>

</html>
