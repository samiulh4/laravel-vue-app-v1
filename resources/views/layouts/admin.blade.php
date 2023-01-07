<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Laravel Vue App V1 | Admin')</title>
    <!-- Jquery -->
    <script src="{{ asset('assets/plugins/jquery/jquery-3.6.0.min.js') }}"></script>
    @include('partials.admin.styles')
    @yield('styles')
</head>

<body id="page-top">

<div id="body-wrapper">
    @include('partials.admin.nav')
    <div class="container-fluid mt-3" id="page-wrapper">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3" id="sidebar-wrapper">
                @include('partials.admin.sidebar')
            </div>
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9" id="content-wrapper">
                @yield('breadcrumb')
                @yield('content')
                @include('partials.admin.footer')
            </div>
        </div><!-- ./content-wrapper -->
    </div>
</div><!-- ./page-wrapper -->


<!-- View Modal -->
<div class="modal fade" id="adminViewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="adminViewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="adminViewModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>






@include('partials.scripts')
@yield('scripts')
@yield('plugins')
</body>

</html>
