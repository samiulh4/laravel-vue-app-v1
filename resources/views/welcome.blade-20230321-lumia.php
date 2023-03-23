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
    <style>
        #hero{
            background: url("{{ asset('assets/common/img/covers/laravel-vue-cover.png') }}") center center;
        }
    </style>

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
@include('partials.lumia.banner')

<main id="main">

    <!-- ======= What We Do Section ======= -->
    @include('partials.lumia.what-we-do')

    <!-- ======= About Section ======= -->
    @include('partials.lumia.about')

    <!-- ======= Skills Section ======= -->
    @include('partials.lumia.skill')

    <!-- ======= Counts Section ======= -->
    @include('partials.lumia.count')

    <!-- ======= Services Section ======= -->
    @include('partials.lumia.service')

    <!-- ======= Portfolio Section ======= -->
    @include('partials.lumia.portfolio')

    <!-- ======= Testimonials Section ======= -->
    @include('partials.lumia.testimonial')

    <!-- ======= Team Section ======= -->
    @include('partials.lumia.team')

    <!-- ======= Contact Section ======= -->
    @include('partials.lumia.contact')

</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('partials.lumia.footer')

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

@include('partials.lumia.scripts')

</body>

</html>
