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
                                <li class="breadcrumb-item active">Chỉnh sửa tài khoản</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Chỉnh sửa tài khoản</h4>
                    </div>
                </div>
            </div>
            <form id="editForm">
                @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Tên cá nhân / tổ chức : <span style="color: red">*</span></label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$profile->name}}" name="name" placeholder="Tên cá nhân hoặc tổ chức" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email : <span style="color: red">*</span></label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$profile->email}}" name="email" placeholder="Email cá nhân hoặc tổ chức" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Số điện thoại :</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$profile->contact}}" name="phone" placeholder="Số điện thoại">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Loại tài khoản : <span style="color: red">*</span></label>
                    <div class="col-sm-5">
                        <select name="type" class="form-control mb-3" placeholder="Loại tài khoản" required>
                            <option value="personal" {{$profile->type == 'personal' ? 'selected' : ''}}>Tài khoản cá nhân</option>
                            <option value="bussiness" {{$profile->type == 'bussiness' ? 'selected' : ''}}>Tài khoản doanh nghiệp</option>
                        </select>
                    </div>
                    {{-- <label class="col-sm-4 col-form-label" style="text-align: end;">Đã xác thực :</label>
                    <div class="col-sm-1">
                        <input type="checkbox" style="width: 30px; height: 30px;" class="form-check-input form-control float-right">
                    </div> --}}
                </div>
                <div class="form-group row mt-3 float-right mr-1">
                    <button id="sendEmailBtn" type="button" class="btn btn-secondary waves-effect waves-light mr-2">
                        <span class="btn-label"><i class="fas fa-envelope"></i></span>Gửi email xác thực
                    </button>
                    <button type="submit" class="btn btn-success waves-effect waves-light mr-2">
                        <span class="btn-label"><i class="mdi mdi-content-save"></i> </span>Lưu
                    </button>
                </div>
            </form>  
        </div>
    </div>
@stop
@section('script')
<script>
    $(document).ready(function () {

        $('#editForm').submit(function (e) { 
            const data = $(this).serializeArray()
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "/users/{{$profile->userId}}/save-edit",
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response && response.result === 'ok'){
                        window.location.href = '/users';
                    }
                    else
                    if(response.result === 'fail'){
                        tata.warn('Thất bại', response.message, {
                            duration: 5000,
                            animate: 'slide',
                            closeBtn: true,
                        });
                    }
                }
            });
            return false;
        });

        $('#sendEmailBtn').click(function (e) { 
            $.ajax({
                type: "post",
                url: "/users/{{$profile->userId}}/send-email-verify",
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                success: function (response) {
                    if(response && response.result === 'ok'){
                        tata.success('Thành công', response.message, {
                            duration: 5000,
                            animate: 'slide',
                            closeBtn: true,
                        });
                    }
                    else
                    if(response.result === 'fail'){
                        tata.error('Thất bại', response.message, {
                            duration: 5000,
                            animate: 'slide',
                            closeBtn: true,
                        });
                    }
                }
            });
        });
        
    });
</script>
@endsection

