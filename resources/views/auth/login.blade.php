@extends('layouts.app')
@section('content')
    <div class="account-pages pt-5 my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="account-card-box">
                        <div class="card mb-0">
                            <div class="card-body p-4">

                                <div class="text-center">
                                    <div class="my-3">
                                        <a href="index.html">
                                            <span><img src="{{asset('admin/assets/images/logo/logo_Sgallery.png')}}" alt="" height="48"></span>
                                        </a>
                                    </div>
                                    <h5 class="text-muted text-uppercase py-3 font-16">Đăng nhập trang quản lý</h5>
                                </div>

                                <form class="mt-2" method="POST" action="{{env('APP_URL')}}/login" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="email" class="control-label sr-only">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password" class="control-label sr-only">Password</label>
                                        <input type="password" name="password" class="form-control" id="password" value="" placeholder="Password" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked="">
                                            <label class="custom-control-label" for="checkbox-signin">Nhớ đăng nhập</label>
                                        </div>
                                    </div>

                                    <div class="form-group text-center">
                                        <button class="btn btn-success btn-block waves-effect waves-light" type="submit"> Đăng nhập </button>
                                    </div>

                                    <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Quên mật khẩu?</a>
                                    @if($notif != null || $notif != '')
                                        <section class='alert alert-danger text-center'>{{$notif}}</section>
                                    @endif
                                </form>
                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end col -->
            </div>
            
        </div>
        <!-- end container -->
    </div>
    <!-- End Content-->
@stop