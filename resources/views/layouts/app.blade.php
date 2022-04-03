<!DOCTYPE html> 
<html lang="en"> 
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0"> 
        <meta charset="utf-8"> 
        <title> Trang quản trị || Hoàng thịnh SG</title> 
        <meta property="og:locale" content="vi_VN"> 
        <meta property="og:type" content="website"> 
        <meta property="og:title" content="Trang quản trị - Hoàng Thịnh"> 
        <meta name="description" content="Sản phẩm mới Camera – Phụ kiện camera Anten – Dây cáp anten – Phụ kiện truyền hình Đầu thu truyền hình số – Tivi box – Điều khiển giọng nói Khung treo tivi – Loa – Tủ lạnh, máy giặt Điều khiển, remote Tivi – Máy lạnh – Quạt – Đầu thu Thiết bị,…"> 
        <meta name="csrf-token" content="{{ csrf_token() }}"> 
        
        <link rel="icon" type="image/png" href="{{asset('shop/assets/images/favicon.svg')}}"> 
        <!-- App css --> 
        <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet"> 
        <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css"> 
        <link href="{{asset('admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet"> 
        <link href="{{asset('admin/assets/libs/tata/tata.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet"> 

        <script src="{{asset('admin/assets/libs/tata/tata.js')}}"> </script> 
        <script src="{{asset('admin/assets/js/utils.js')}}"> </script> 
    </head> 
    <body class="authentication-bg"> 
        @yield('content')
    </body> 
    <!-- Vendor js --> 
    <script src="{{asset('admin/assets/js/vendor.min.js')}}"> </script> 
    <!-- App js --> 
    <script src="{{asset('admin/assets/js/app.min.js')}}"> </script> 
    @yield('script')
</html> 
