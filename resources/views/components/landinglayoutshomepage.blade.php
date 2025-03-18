<!doctype html>
<html lang="en" data-theme="{{ \App\Models\landing\LandingMain::value('data_theme') }}">

<head>
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


    <!-- Hero Section -->
    <section class="flex-1 flex flex-col items-center  text-center">

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
