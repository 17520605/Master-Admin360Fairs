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
                                            <span><img src="{{asset('admin/assets/images/logo/logo-xlarge.png')}}" alt="" height="38"></span>
                                        </a>
                                    </div>
                                    <div class="py-3">
                                        <h5 class="text-muted text-uppercase font-16">Lấy lại mật khẩu</h5>
                                        <p class="text-muted">Nhập địa chỉ email của bạn và chúng tôi sẽ gửi cho bạn một email kèm theo hướng dẫn để đặt lại mật khẩu của bạn.</p>
                                    </div>
                                </div>
                                <form action="#" class="mt-2">
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="email" required="" placeholder="Nhập email của bạn">
                                    </div>
                                    <div class="form-group text-center mb-0">
                                        <button class="btn btn-success btn-block waves-effect waves-light" type="submit"> Gửi Email </button>
                                    </div>
                                </form>

                            </div>
                            <!-- end card-body -->
                        </div>
                        <!-- end card -->
                    </div>

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-white-50">Trở lại trang <a href="pages-login.html" class="text-white ml-1"><b>Đăng nhập</b></a></p>
                        </div>
                        <!-- end col -->
                    </div>
                    

                </div>
                <!-- end col -->
            </div>
            
        </div>
        <!-- end container -->
    </div>
@stop
