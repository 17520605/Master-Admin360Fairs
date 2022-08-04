<!DOCTYPE html>
<html lang="en">
    @include('components.head')
    <body>
        <div id="wrapper">
            <!-- Start of TopBar -->
                @include('components.topbar')
            <!-- End of TopBar -->
            <!-- Start of LeftBar -->
                @include('components.leftbar')
            <!-- End of LeftBar -->
            <div class="content-page">
                @yield('content')
                <!-- Start of Footer -->
                    @include('components.footer')
                <!-- End of Footer -->
            </div>
        </div>
        <section class="loader" id="pageLoader">
            <div class="loading" >
                <span class="loading__anim"></span>
            </div>
        </section>
        @include('components.foot')
        @yield('script')
    </body>
</html>
