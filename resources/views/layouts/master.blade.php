<!DOCTYPE html>
<html lang="en">
    @include('components.header')
    <body id="page-top">
        <div id="wrapper">
            @include('components.navbar-left')
            <div id="content-wrapper" class="d-flex flex-column">
                <div id="content">
                    @include('components.navbar-top')
                    @yield('content')
                </div>
                @include('components.footer')
            </div>
        </div>
    </body>
</html>
