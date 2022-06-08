<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Bootstrap core CSS -->
    <link href=" {{ asset('css/bootstrap.min.css') }}" rel="stylesheet" crossorigin="anonymous">
    <link href=" {{ asset('css/my.css') }}" rel="stylesheet">
    <meta name="theme-color" content="#7952b3">
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
</head>
<body>
@include('layouts.header')
@include('layouts.modal')
<main class="py-5 container">

    @include('layouts.errors')
    @yield('content')
</main>

@include('layouts.footer')
<script src="{{ asset("js/bootstrap.bundle.min.js") }}" ></script>
</body>
</html>
