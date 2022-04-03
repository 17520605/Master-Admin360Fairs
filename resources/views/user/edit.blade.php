@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Trang chủ</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tài khoản</a></li>
                                <li class="breadcrumb-item active">Thêm mới tài khoản</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Thêm mới tài khoản</h4>
                    </div>
                </div>
            </div>
            <form action="{{route('master.post.user.save-edit',$user->userId)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Họ tên khách hàng hoặc tổ chức :</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="name" placeholder="Họ tên khách hàng hoặc tổ chức" value="{{$user->name}}">
                    </div>
                </div>
 
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email khách hàng :</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="email" placeholder="Email khách hàng" value="{{$user->email}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Số điện thoại khách hàng :</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="phone" placeholder="Số điện thoại khách hàng" value="{{$user->contact!=null?$user->contact:''}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Password khách hàng :</label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" id="" name="password" placeholder="Password khách hàng">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Địa chỉ khách hàng :</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="address" placeholder="Địa chỉ khách hàng" value="{{$user->address}}" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Mở rộng :</label>
                    <div class="col-sm-10">
                        <div class="row">
                            <div class="col-sm-5">
                                <select name="type" class="form-control mb-3" placeholder="Giá cũ của sản phẩm" value="{{$user->type}}">
                                    <option value="personal">Khách hàng cá nhân</option>
                                    <option value="bussiness">Khách hàng doanh nghiệp</option>
                                </select>
                            </div>
                            <div class="col-sm-7">
                                <select name="isPublic" class="form-control mb-3" placeholder="Giá cũ của sản phẩm" value="{{$user->isPublic}}">
                                    <option value="1">Public</option>
                                    <option value="0">UnPublic</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-3 float-right mr-1">
                    <button id="btn-clear" type="reset" class="btn btn-secondary waves-effect waves-light mr-2">
                        <span class="btn-label"><i class="fas fa-window-close"></i> </span>Đóng
                    </button>
                    <button type="submit" class="btn btn-success waves-effect waves-light mr-2">
                        <span class="btn-label"><i class="mdi mdi-content-save"></i> </span>Lưu thông tin
                    </button>
                </div>
            </form>  
        </div>
    </div>
@stop
@section('script')

@stop

