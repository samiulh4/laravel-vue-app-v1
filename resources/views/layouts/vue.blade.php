<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('assets/common/img/icons/vue.png') }}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel & Vue App | Vue</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Fontawesome CSS -->
    <link href="{{ asset('assets/common/plugins/fontawesome/css/all.min.css') }}" rel="stylesheet">


    <style>
        @font-face {
            font-family: 'Alfa Slab One';
            src: url({{ asset('assets/common/fonts/Alfa_Slab_One/AlfaSlabOne-Regular.ttf') }}) format('truetype');

        }
        @font-face {
            font-family: 'Dancing Script Regular';
            src: url({{ asset('assets/common/fonts/Dancing_Script/DancingScript-Regular.ttf') }}) format('truetype');

        }
        @font-face {
            font-family: 'Roboto Regular';
            src: url({{ asset('assets/common/fonts/Roboto/Roboto-Regular.ttf') }}) format('truetype');
        }
    </style>
    <!-- Custom CSS -->
    <link href="{{ asset('assets/common/styles/vue/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="root">
        <root></root>
{{--        <router-view></router-view><!-- where to place route component-->--}}
    </div>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <!-- Fontawesome JS -->
    <script src="{{ asset('assets/common/plugins/fontawesome/js/all.min.js') }}"></script>
</body>

</html>
