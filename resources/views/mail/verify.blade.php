<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Chào {{$model['name']}}.</h3>
    <p>Cảm ơn bạn đã sử dụng hệ thống 360fairs</p>
    <p>Click vào link bên dưới để xác thực tài khoản</p>
    <a href="{{env('TOUR_MANAGEMENT_URL')}}/init-password?email={{$model['email']}}&token={{$model['token']}}">Xác thực</a>
</body>
</html>