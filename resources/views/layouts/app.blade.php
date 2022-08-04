<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta charset="utf-8">
        <meta name="author" content="Gallery">
        <meta name="MobileOptimized" content="320">
        <meta property="og:url"                content="https://360fairs.com/" />
        <meta property="og:type"               content="Sự kiện triển lãm ảo" />
        <meta property="og:title"              content="TRIỂN LÃM ẢO: CÁCH GIA TĂNG KHÁCH HÀNG TIỀM NĂNG VÀO NĂM 2022" />
        <meta property="og:description"        content="Đại dịch gần đây đã tạo cơ hội tuyệt vời cho các triển lãm trực tuyến, triển lãm ảo được phát huy thế mạnh của mình.. Vậy, triển lãm ảo là gì? Và làm thế nào để chúng gia tăng khách hàng tiềm năng cho bạn?" />
        <meta property="og:image"              content="https://i.pinimg.com/564x/a4/91/83/a4918323521a0438746ea4ff8a6cba92.jpg" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Gallery - Hội chợ triển lãm thực tế ảo sống động</title>
        <link rel="shortcut icon" href="{{ asset('/logo-shortcut.png')}}">
         <!-- App css -->
        <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
        <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet">
        <link href="{{asset('admin/assets/libs/tata/tata.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet">
        <script src="{{asset('admin/assets/libs/tata/tata.js')}}"></script>
        <script src="{{asset('admin/assets/js/utils.js')}}"></script>
    </head>
    <body class="authentication-bg">
        @yield('content')
    </body>
    <!-- Vendor js -->
    <script src="{{asset('admin/assets/js/vendor.min.js')}}"></script>
    <!-- App js -->
    <script src="{{asset('admin/assets/js/app.min.js')}}"></script>
    @yield('script')
</html>
