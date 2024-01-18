{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="keywords"
        content="ShopUS, bootstrap-5, bootstrap, sass, css, HTML Template, HTML,html, bootstrap template, free template, figma, web design, web development,front end, bootstrap datepicker, bootstrap timepicker, javascript, ecommerce template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ URL::asset('website') }}/{{ URL::asset('website') }}/assets/images/homepage-one/icon.png">
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

    <script src="{{ URL::asset('website') }}/{{ URL::asset('website') }}/assets/js/jquery_3.7.1.min.js"></script>
    <script src="{{ URL::asset('website') }}/{{ URL::asset('website') }}/assets/js/bootstrap_5.3.2.bundle.min.js"></script>
    <script src="{{ URL::asset('website') }}/{{ URL::asset('website') }}/assets/js/nouislider.min.js"></script>
    <script src="{{ URL::asset('website') }}/{{ URL::asset('website') }}/assets/js/aos-3.0.0.js"></script>
    <script src="{{ URL::asset('website') }}/{{ URL::asset('website') }}/assets/js/swiper10-bundle.min.js"></script>
    <script src="{{ URL::asset('website') }}/{{ URL::asset('website') }}/assets/js/shopus.js"></script>
    @section('scripts')
</body>

</html> --}}

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ URL::asset('website') }}/{{ URL::asset('website') }}/assets/images/favicon.ico">

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('website') }}/assets/css/bootstrap.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="{{ URL::asset('website') }}/assets/css/font-awesome.min.css">
    <!-- Fontawesome Star -->
    <link rel="stylesheet" href="{{ URL::asset('website') }}/assets/css/fontawesome-stars.css">
    <!-- Ion Icon -->
    <link rel="stylesheet" href="{{ URL::asset('website') }}/assets/css/ionicons.min.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="{{ URL::asset('website') }}/assets/css/slick.min.css">
    <!-- Animation -->
    <link rel="stylesheet" href="{{ URL::asset('website') }}/assets/css/animate.min.css">
    <!-- jQuery Ui -->
    <link rel="stylesheet" href="{{ URL::asset('website') }}/assets/css/jquery-ui.min.css">
    <!-- Nice Select -->
    <link rel="stylesheet" href="{{ URL::asset('website') }}/assets/css/nice-select.min.css">
    <!-- Timecircles -->
    <link rel="stylesheet" href="{{ URL::asset('website') }}/assets/css/timecircles.min.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ URL::asset('website') }}/assets/css/style.css">
    @yield('head')
</head>

<body class="template-color-1">

    <div class="main-wrapper">

        <x-header />
        @yield('content')
        <x-footer />
    </div>



    <!-- jQuery JS -->
    <script src="{{ URL::asset('website') }}/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{ URL::asset('website') }}/assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <!-- Modernizer JS -->
    <script src="{{ URL::asset('website') }}/assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="{{ URL::asset('website') }}/assets/js/vendor/bootstrap.bundle.min.js"></script>

    <!-- Slick Slider JS -->
    <script src="{{ URL::asset('website') }}/assets/js/plugins/slick.min.js"></script>
    <!-- Countdown JS -->
    <script src="{{ URL::asset('website') }}/assets/js/plugins/countdown.min.js"></script>
    <!-- Barrating JS -->
    <script src="{{ URL::asset('website') }}/assets/js/plugins/jquery.barrating.min.js"></script>
    <!-- Counterup JS -->
    <script src="{{ URL::asset('website') }}/assets/js/plugins/jquery.counterup.min.js"></script>
    <!-- Waypoints -->
    <script src="{{ URL::asset('website') }}/assets/js/plugins/waypoints.min.js"></script>
    <!-- Nice Select JS -->
    <script src="{{ URL::asset('website') }}/assets/js/plugins/jquery.nice-select.min.js"></script>
    <!-- Sticky Sidebar JS -->
    <script src="{{ URL::asset('website') }}/assets/js/plugins/jquery.sticky-sidebar.js"></script>
    <!-- Jquery-ui JS -->
    <script src="{{ URL::asset('website') }}/assets/js/plugins/jquery-ui.min.js"></script>
    <!-- Scroll Top JS -->
    <script src="{{ URL::asset('website') }}/assets/js/plugins/scroll-top.min.js"></script>
    <!-- Theia Sticky Sidebar JS -->
    <script src="{{ URL::asset('website') }}/assets/js/plugins/theia-sticky-sidebar.min.js"></script>
    <!-- ElevateZoom JS -->
    <script src="{{ URL::asset('website') }}/assets/js/plugins/jquery.elevateZoom-3.0.8.min.js"></script>
    <!-- Timecircles JS -->
    <script src="{{ URL::asset('website') }}/assets/js/plugins/timecircles.min.js"></script>
    <!-- Mailchimp Ajax JS -->
    <script src="{{ URL::asset('website') }}/assets/js/plugins/mailchimp-ajax.js"></script>

    <!-- Main JS -->
    <script src="{{ URL::asset('website') }}/assets/js/main.js"></script>
    <!-- <script src="{{ URL::asset('website') }}/assets/js/main.min.js"></script> -->
    <x-toast-message />
    @section('scripts')
</body>

</html>
