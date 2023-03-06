<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Laravel & Vue App | Lumia</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicons -->
    <link href="{{ asset('assets/common/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/lumia/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <!-- Jquery -->
    <script src="{{ asset('assets/common/plugins/jquery/jquery-3.6.0.min.js') }}"></script>
@include('partials.lumia.styles')
@yield('styles')

<!-- =======================================================
    * Template Name: Lumia - v4.10.0
    * Template URL:
    * Author: BootstrapMade.comhttps://bootstrapmade.com/lumia-bootstrap-business-template/
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
@include('partials.lumia.header')

<!-- ======= Hero Section ======= -->
@yield('cover')

<main id="main">
    @yield('content')
</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('partials.lumia.footer')

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

@include('partials.lumia.scripts')
@yield('scripts')
</body>

</html>
