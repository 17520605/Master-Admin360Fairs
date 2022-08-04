    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">
        <div class="slimscroll-menu">
            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <ul class="metismenu" id="side-menu">
                    <li class="menu-title">Chức năng</li>
                    <li>
                        <a href="{{ route('master.home')}}">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('master.get.manager.list-managers')}}">
                            <i class="mdi mdi-account-star"></i>
                            <span> Account </span>
                        </a>
                    </li>
 
                    <li>
                        <a href="{{ route('master.get.user.list-users')}}">
                            <i class="mdi mdi-account-multiple"></i>
                            <span> Account Tour</span>
                        </a>
                    </li>
 
                    <li>
                        <a href="{{ route('master.get.article.list-articles')}}">
                            <i class="mdi mdi-feather"></i>
                            <span> Bài viết </span>
                        </a>
                    </li>
                    <li class="menu-title mt-2">Mở rộng</li>
                    <li>
                        <a href="{{ route('master.get.gallery')}}">
                            <i class="mdi mdi-star-circle"></i>
                            {{-- <span class="badge badge-danger badge-pill float-right">9</span> --}}
                            <span> Gallary nổi bật</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('master.get.contact.list-contacts')}}">
                            <i class="mdi mdi-comment-question"></i>
                            {{-- <span class="badge badge-danger badge-pill float-right">9</span> --}}
                            <span> Liên hệ</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('master.get.setting-upload')}}">
                            <i class="mdi mdi-folder-settings-variant"></i>
                            <span> Cấu hình upload </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('master.get.setting')}}">
                            <i class="mdi mdi-settings"></i>
                            <span> Cài đặt </span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Sidebar -->
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -left -->
    </div>
    <!-- Left Sidebar End -->
