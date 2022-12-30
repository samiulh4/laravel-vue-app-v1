<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Laravel Vue App V1 | Common')</title>
    <!-- Jquery -->
    <script src="{{ asset('assets/plugins/jquery/jquery-3.6.0.min.js') }}"></script>
    @include('partials.styles')
    @yield('styles')
</head>

<body id="page-top">



<div id="page-wrapper">
    @include('partials.admin.nav')
    <div class="container-fluid mt-3" id="content-wrapper">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3">
                @include('partials.admin.sidebar')
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                @yield('breadcrumb')
                @yield('content')
            </div>
        </div>
    </div><!-- ./content-wrapper -->
    @include('partials.admin.footer')
</div><!-- ./page-wrapper -->




@include('partials.scripts')
@yield('scripts')
</body>

</html>
