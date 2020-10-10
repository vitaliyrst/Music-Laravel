<!doctype html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src=" {{ asset('https://code.jquery.com/jquery-3.5.1.js') }}"
            integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
            crossorigin="anonymous"></script>
    <title>@yield('title-block')</title>
</head>
<body class="body">
<header>
    @include('music_test.public.blocks.header.header')
</header>
<div class="container-xl mt-5">
    @include('music_test.public.blocks.errors.errors')
    @yield('breadcrumbs')
    <div class="row">
        <div class="col-9">
            @yield('content')
        </div>
        <div class="col-3">
            @include('music_test.public.blocks.aside.aside')
        </div>
    </div>
</div>
<footer>
    @include('music_test.public.blocks.footer.footer')
</footer>
</body>
