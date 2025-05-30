<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title', config('app.name')) {{ config('app.name') }}
    </title>

    @yield('seo')

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font.awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/venobox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    @yield('css')
</head>

<body>
    <div class="main-wrapper">
        @php
            $cart = app(\App\Services\CartService::class)->getCart();
            $total = app(\App\Services\CartService::class)->getTotal();
        @endphp

        @include('components.header.header', ['cart' => $cart])

        @yield('content')

        @include('components.footer.footer')

    </div>

    <div class="offcanvas-overlay"></div>

    @include('components.cart.offcanvas-cart', ['cart' => $cart, 'total' => $total])

    @include('components.mobile-menu.navigation')

    @include('components.modal.modal-product')

    @include('components.modal.modal-call')

    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/scrollUp.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/venobox.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/mailchimp-ajax.js') }}"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>

    @yield('js')
</body>

</html>
