<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if (isset($meta) && $meta)
    <title>{{ $meta->title }}</title>
    <meta name="keywords" content="{{ $meta->keywords }}">
    <meta name="description" content="{{ $meta->description }}">
    @else
    <title>memtube</title>
    @endif
    <link rel="icon" type="image/png" href="/img/fav32х.png">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <livewire:styles />
    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://vjs.zencdn.net/7.8.4/video-js.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css" integrity="sha512-kJ30H6g4NGhWopgdseRb8wTsyllFUYIx3hiUwmGAkgA9B/JbzUBDQVr2VVlWGde6sdBVOG7oU8AL35ORDuMm8g==" crossorigin="anonymous" />
    <link rel="icon" type="image/png" href="{{ asset('img/fav32х.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>
<body>
    <div id="app" style="
  margin: 0;
  display: flex;
  flex-direction: column;
  min-height: 100vh;
  justify-content: start;
">
        <livewire:header />
        {{ $slot }}
        <livewire:footer />
    </div>
    <livewire:scripts />
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" integrity="sha512-F5QTlBqZlvuBEs9LQPqc1iZv2UMxcVXezbHzomzS6Df4MZMClge/8+gXrKw2fl5ysdk4rWjR0vKS7NNkfymaBQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/fontawesome.min.js" integrity="sha512-kI12xOdWTh/nL2vIx5Yf3z/kJSmY+nvdTXP2ARhepM/YGcmo/lmRGRttI3Da8FXLDw0Y9hRAyZ5JFO3NrCvvXA==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script type="text/javascript" src="{{ asset('js/mdb.min.js') }}"></script>
    {{-- <script>

        new WOW().init();

        $(function () {
            $("#mdb-lightbox-ui").load("{% static '/mdb-addons/mdb-lightbox-ui.html' %}");
        });

        $(document).ready(function() {
            $(".button-collapse").sideNav({
                edge: 'right'
            });
        });

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script> --}}
</body>
</html>

