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
    <script src="{{ asset('assets/common/plugins/jquery/jquery-3.6.0.min.js') }}"></script>
    @include('partials.admin.styles')
    <link href="{{ asset('assets/common/styles/admin/style.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body id="page-top">

<section id="body-wrapper">
    @include('partials.admin.nav')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 p-0">
                <section id="adminSidebar">
                    @include('partials.admin.sidebar')
                </section>
            </div>
            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10">
                <section id="adminBreadcrumb">
                    @yield('breadcrumb')
                </section>
                <section id="adminMainContent">
                    @yield('content')
                </section>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <section id="adminFooter">
                    @include('partials.admin.footer')
                </section>
            </div>
        </div>
    </div>
</section>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

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


@include('partials.admin.scripts')
@yield('scripts')
@yield('plugins')
</body>

</html>
