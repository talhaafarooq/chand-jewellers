<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords"
        content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('website') }}/assets/images/homepage-one/icon.png">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ URL::asset('website') }}/css/swiper10-bundle.min.css">
    <link rel="stylesheet" href="{{ URL::asset('website') }}/css/bootstrap-5.3.2.min.css">
    <link rel="stylesheet" href="{{ URL::asset('website') }}/css/nouislider.min.css">
    <link rel="stylesheet" href="{{ URL::asset('website') }}/css/aos-3.0.0.css">
    <link rel="stylesheet" href="{{ URL::asset('website') }}/css/style.css">
    @yield('head')
</head>

<body>
    <x-header />
    @yield('content')
    <x-footer />

    <script src="{{ URL::asset('website') }}/assets/js/jquery_3.7.1.min.js"></script>
    <script src="{{ URL::asset('website') }}/assets/js/bootstrap_5.3.2.bundle.min.js"></script>
    <script src="{{ URL::asset('website') }}/assets/js/nouislider.min.js"></script>
    <script src="{{ URL::asset('website') }}/assets/js/aos-3.0.0.js"></script>
    <script src="{{ URL::asset('website') }}/assets/js/swiper10-bundle.min.js"></script>
    <script src="{{ URL::asset('website') }}/assets/js/shopus.js"></script>
    @section('scripts')
</body>

</html>
