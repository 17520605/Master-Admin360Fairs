<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <img src="{{asset('admin/assets/images/logo/logo_Sgallery.png')}}" alt="" height="42">
    <h3>Kính gửi Quý khách {{$model['name']}}.</h3>
    <p>SGallery xin gửi Quý khách thông tin tài khoản theo thông tin sau:</p>
    <p>Loại tài khoản: Quản lý tour</p>
    <p>Link đăng nhập: <a href="{{env('TOUR_MANAGEMENT_URL')}}">{{env('TOUR_MANAGEMENT_URL')}}</a></p>
    <p>Tên đăng nhập : {{$model['email']}} </p>
    <p>Mật khẩu : {{$model['password']}} </p>
    <p>Quý khách vui lòng không chia sẽ thông tin cho bất kì ai với bất kì lí do gì để tránh trường hợp xấu xảy ra !</p>
    <p>Nếu có bất kì thắc mắc xin liên hệ cho chúng tôi qua email <a href="mailto:sgallery@gmail.com">sgallery@gmail.com</a></p>
</body>
</html>