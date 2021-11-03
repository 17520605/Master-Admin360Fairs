<!doctype html>
<html lang="en">
@include('components.header')
<body class="theme-blue">
    @include('components.page-loader')
    <div id="wrapper">
        @include('components.navbar-top')
        @include('components.navbar-left')
        <div id="main-content">
            @yield('content')
        </div>
    </div>
    @include('components.footer')
</body>

</html>