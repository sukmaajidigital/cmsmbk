<!doctype html>
<html lang="en" data-theme="{{ \App\Models\landing\LandingMain::value('data_theme') }}">

<head>
    {{-- static seo --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>{{ \App\Models\landing\LandingMain::value('longname') }}</title>
    <meta name="title" content="{{ \App\Models\landing\LandingMain::value('longname') }}">
    <meta property="og:title" content="{{ $subname ?? '' }}">
    {{ $meta ?? '' }}
    <meta name="robots" content="noindex,nofollow">
    <meta property="og:locale" content="id">
    <meta property="og:locale:alternate" content="en">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('storage/' . \App\Models\landing\LandingMain::value('icon')) }}">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#00753C">
    <meta name="theme-color" content="#00753C">
    <link rel="shortcut icon" type="image/png" href="{{ asset('storage/' . \App\Models\landing\LandingMain::value('icon')) }}" />

    <!-- Stylesheets -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('assets/datatable/datatable.css') }}" />
</head>

<body class="bg-base-100 text-base-content">
    <!-- Hero Section -->
    <section class="overflow-x-hidden">
        {{ $slot }}
    </section>
    <x-landingfooter />
    @vite('resources/js/app.js')
    <script src="{{ asset('assets/jquery/dist/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/datatable/datatable.min.js') }}"></script>
    @stack('script')
    @stack('componentscript')
</body>

</html>
