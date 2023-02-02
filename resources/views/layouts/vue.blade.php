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
    <link href="{{ asset('assets/common/styles/vue/style.css') }}" rel="stylesheet">
</head>

<body>
    <div id="root">
        <root></root>
        <router-view></router-view><!-- where to place route componennt-->
    </div>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>