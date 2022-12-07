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


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2 class="fs-5">Popover in a modal</h2>
                <p>This <a href="#" role="button" class="btn btn-secondary" data-bs-toggle="popover"
                           title="Popover title"
                           data-bs-content="Popover body content is set in this attribute.">button</a> triggers a
                    popover on click.</p>
                <hr>
                <h2 class="fs-5">Tooltips in a modal</h2>
                <p><a href="#" data-bs-toggle="tooltip" title="Tooltip">This link</a> and <a href="#"
                                                                                             data-bs-toggle="tooltip"
                                                                                             title="Tooltip">that
                        link</a> have tooltips on hover.</p>
                <p>Iron Man is a superhero appearing in American comic books published by Marvel Comics. The character
                    was co-created by writer and editor Stan Lee, developed by scripter Larry Lieber, and designed by
                    artists Don Heck and Jack Kirby. The character made his first appearance in Tales of Suspense #39
                    (cover dated March 1963), and received his own title in Iron Man #1 (May 1968). Also in 1963, the
                    character founded the Avengers alongside Thor, Ant-Man, Wasp and the Hulk.

                    A wealthy American business magnate, playboy, philanthropist, inventor and ingenious scientist,
                    Anthony Edward Stark suffers a severe chest injury during a kidnapping. When his captors attempt to
                    force him to build a weapon of mass destruction, he instead creates a mechanized suit of armor to
                    save his life and escape captivity. Later, Stark develops his suit, adding weapons and other
                    technological devices he designed through his company, Stark Industries. He uses the suit and
                    successive versions to protect the world as Iron Man. Although at first concealing his true
                    identity, Stark eventually publicly reveals himself to be Iron Man.

                    Initially, Iron Man was a vehicle for Stan Lee to explore Cold War themes, particularly the role of
                    American technology and industry in the fight against communism. Subsequent re-imaginings of Iron
                    Man have transitioned from Cold War motifs to contemporary matters of the time.[1]</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>

        </div>
    </div>
</div>


<div class="modal-dialog modal-xl">...</div>
<div class="modal-dialog modal-lg">...</div>
<div class="modal-dialog modal-sm">...</div>

<!-- Full screen modal -->
<div class="modal-dialog modal-fullscreen-sm-down">
    ...
</div>

@include('partials.scripts')
@yield('scripts')
</body>

</html>
