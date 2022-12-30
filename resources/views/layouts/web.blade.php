<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('assets/common/img/favicon.png') }}"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Laravel Vue App V1 | Web')</title>
    <!-- Jquery -->
    <script src="{{ asset('assets/common/plugins/jquery/jquery-3.6.0.min.js') }}"></script>
    @include('partials.web.styles')
    @yield('styles')
</head>

<body id="page-top">



<div id="page-wrapper">
    @include('partials.web.nav')
    <div class="container-fluid" id="content-wrapper">
        <div class="row">
            @yield('content')
        </div>
    </div><!-- ./content-wrapper -->
</div><!-- ./page-wrapper -->




@include('partials.web.scripts')
@yield('scripts')
</body>

</html>
