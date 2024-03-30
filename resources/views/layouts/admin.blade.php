<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Agat Ceramic Админка @yield('title')</title>

    <meta name="robots" content="index, follow">
    <meta name="description" content="Hmart-Smart Product eCommerce html Template">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico">

    <link rel="stylesheet" href="{{ URL::asset('assets/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    @yield('css')

    <link rel="stylesheet" href="{{ URL::asset('assets/adminlte/dist/css/adminlte.min.css') }}">

    {{-- <link rel="stylesheet" href="assets/css/app-z-EbYdqb.css"> --}}

    @vite(['resources/scss/admin/app.scss'])
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">

        @include('components.admin.header.header')

        <!-- Main Sidebar Container -->
        {{-- @include('components.sidebar') --}}

        <main class="content-wrapper">

            @yield('content-header')

            <section class="content">
                <div class="container-fluid">

                    @yield('content')

                </div>
            </section>
        </main>

        <!-- Footer -->
        {{-- @include('components.footer') --}}
        <!-- /.footer -->
    </div>

    <script src="{{ URL::asset('assets/adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('assets/adminlte/dist/js/adminlte.min.js') }}"></script>

    @yield('js')
</body>

</html>
