<!doctype html>
<html lang="en" data-theme="{{ \App\Models\landing\LandingMain::value('data_theme') }}">

<head>
    {{-- test seo --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Beranda</title>
    <meta name="description" content="Raharja Energi Cepu terus berkontribusi untuk meningkatkan efisiensi dan kualitas layanan energi untuk Indonesia ">
    <meta name="keywords" content="rec, raharja energi cepu">
    <meta property="og:title" content="Beranda">
    <meta property="og:description" content="Raharja Energi Cepu terus berkontribusi untuk meningkatkan efisiensi dan kualitas layanan energi untuk Indonesia ">
    <meta property="og:locale" content="id">
    <meta property="og:image" content="https://admin.rec.co.id/uploads/hero_811430ed17.webp">
    <meta property="og:locale:alternate" content="en">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Beranda">
    <meta name="twitter:description" content="Raharja Energi Cepu terus berkontribusi untuk meningkatkan efisiensi dan kualitas layanan energi untuk Indonesia ">
    <meta name="twitter:image" content="https://admin.rec.co.id/uploads/hero_811430ed17.webp">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#00753C">
    <meta name="theme-color" content="#00753C">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="{{ \App\Models\Setting::value('app_name') }}{{ $subname ?? '' }}">
    {{ $meta ?? '' }}
    <meta name="robots" content="noindex,nofollow">

    <title>{{ \App\Models\landing\LandingMain::value('longname') }} - {{ $subname ?? '' }}</title>
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
