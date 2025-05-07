<!doctype html>
<html lang="en" data-theme="{{ \App\Models\landing\LandingMain::value('data_theme') }}">

<head>
    {{-- static seo --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ \App\Models\landing\LandingMain::value('longname') }}</title>
    <meta name="title" content="{{ \App\Models\landing\LandingMain::value('longname') }}">
    <meta property="og:title" content="{{ $subname ?? '' }}">
    {{ $meta ?? '' }}
    <meta name="robots" content="noindex,nofollow">
    <meta property="og:locale" content="id">
    <meta property="og:locale:alternate" content="en">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('storage/' . \App\Models\landing\LandingMain::value('icon')) }}">
    <link rel="icon" type="image/png" href="{{ asset('storage/' . \App\Models\landing\LandingMain::value('icon')) }}">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#ffc107">
    <meta name="theme-color" content="#ffc107">
    <link rel="shortcut icon" type="image/png" href="{{ asset('storage/' . \App\Models\landing\LandingMain::value('icon')) }}" />
    <link rel="canonical" href="{{ url()->current() }}" />
    {{-- <!-- Stylesheets --> --}}
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('assets/datatable/datatable.css') }}" />
    <link rel="stylesheet" href="{{ asset('richtexteditor/richtexteditor/rte_theme_default.css') }}" />
</head>

<body class="bg-base-100 text-base-content">
    <main>
        <div class="h-screen flex flex-col">
            {{-- <!-- Navbar --> --}}
            <x-landingheader />
            {{-- <!-- Hero Section --> --}}
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
    <script type="text/javascript" src="{{ asset('richtexteditor/richtexteditor/rte.js') }}"></script>
    <script type="text/javascript" src="{{ asset('richtexteditor/richtexteditor/plugins/all_plugins.js') }}"></script>
</body>

</html>
