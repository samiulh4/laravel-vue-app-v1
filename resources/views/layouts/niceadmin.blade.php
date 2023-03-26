<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>@yield('title', 'Laravel App | Admin | V2')</title>
    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('assets/common/img/favicon.png') }}"/>
    <link href="{{ asset('assets/niceadmin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <!-- Jquery -->
    <script src="{{ asset('assets/common/plugins/jquery/jquery-3.6.0.min.js') }}"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    @include('partials.niceadmin.styles')
    @yield('styles')
</head>

<body>
@include('partials.niceadmin.nav')
@include('partials.niceadmin.sidebar')
<main id="main" class="main">
    @yield('breadcrumb')
    <section class="section">
        <div class="row">
            @yield('content')
        </div>
    </section>
</main><!-- End #main -->
@include('partials.niceadmin.footer')
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>
@include('partials.niceadmin.scripts')
@yield('scripts')
</body>

</html>
