<!doctype html>
<html lang="en">
    <head>
        <title>Administrators</title>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="description" content="Administrators - Nguyễn Hữu Minh Khai">
        <meta name="author" content="Nguyễn Hữu Minh Khai">
    
        <link rel="icon" href="{{ asset('asset/image/svg/logo-shortcut.svg')}}" type="image/x-icon">
        <!-- VENDOR CSS -->
        <link rel="stylesheet" href="{{ asset('asset/style/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{ asset('asset/style/font-awesome.min.css')}}">
        <!-- MAIN CSS -->
        <link rel="stylesheet" href="{{ asset('asset/style/main.css')}}">
        <link rel="stylesheet" href="{{ asset('asset/style/color_skins.css')}}">
    </head>
<body class="theme-blue">
    @include('components.page-loader')
    @yield('content')
    <!-- Javascript -->
    <script src="{{ asset('asset/js/libscripts.bundle.js')}}"></script>
    <script src="{{ asset('asset/js/vendorscripts.bundle.js')}}"></script>
    <!-- Jquery Knob-->
    <script src="{{ asset('asset/js/mainscripts.bundle.js')}}"></script>
</body>

</html>