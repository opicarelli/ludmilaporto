<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />

        @section('meta_keywords')
            <meta name="keywords" content="ludmila porto, livros objetos" />
        @show
        @section('meta_author')
            <meta name="author" content="Ludmila Porto" />
        @show
        @section('meta_keywords')
            <meta name="description" content="Trabalhos de Ludmila Porto" />
        @show

        <title>
            @section('title')
                Ludmila Porto
            @show
        </title>

        <link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}">
        <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/jquery-video-lightning-2.0.0.css') }}" />
        @yield('styles')

        <script src="{{ asset('assets/js/jquery-1.10.2.min.js') }}"></script>
        <script src="{{ asset('assets/js/lightbox-2.6.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery-video-lightning-2.0.0.min.js') }}"></script>
        @yield('scripts')
    </head>
    <body>
        <div id="container">
            @yield('content')
        </div>
    </body>
</html>