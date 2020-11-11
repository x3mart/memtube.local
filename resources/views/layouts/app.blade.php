<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <livewire:styles />
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet"/>
</head>
<body>
    <div id="app">
        <livewire:header />
        {{ $slot}}
        {{-- <main class="py-4">
            @yield('content')
        </main> --}}
    </div>
    <livewire:scripts />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
    <script>

        new WOW().init();

        $(function () {
            $("#mdb-lightbox-ui").load("{% static '/mdb-addons/mdb-lightbox-ui.html' %}");
        });

        $(document).ready(function() {
            $(".button-collapse").sideNav({
                edge: 'right'
            });
        });

    </script>
</body>
</html>
