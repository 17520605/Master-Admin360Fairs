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
                                <li class="breadcrumb-item active">Chỉnh sửa mật khẩu</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Chỉnh sửa mật khẩu</h4>
                    </div>
                </div>
            </div>
            <form id="editForm">
                @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Mật khẩu : <span style="color: red">*</span></label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" id="pasword" name="password" placeholder="Mật khẩu" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nhập lại Mật khẩu : <span style="color: red">*</span></label>
                    <div class="col-sm-10">
                    <input type="password" class="form-control" id="repasword" name="repassword" placeholder="Nhập lại khẩu" required>
                    </div>
                </div>
                <div class="form-group row mt-3 float-right mr-1">
                    <button type="submit" id="submitForm" disabled class="btn btn-success waves-effect waves-light mr-2">
                        <span class="btn-label"><i class="mdi mdi-content-save"></i> </span>Lưu thay đổi
                    </button>
                </div>
            </form>  
        </div>
    </div>
@stop
@section('script')
<script>
    $(document).ready(function () {
        $('#pasword').on('keyup', function() {
            let password = $('#pasword').val();
            console.log(password);
            if(password)
            {
                $('#repasword').prop('disabled', false);
            }
            else{
                $('#repasword').prop('disabled', true);
            }
        });
        $("#repasword").on('keyup', function() {
            var password = $("#pasword").val();
            var repasword = $("#repasword").val();
            if (password != repasword)
            {
                $("#repasword").css('border', '1px solid #c00')
            }
            else if (password === repasword)
            {
                $("#repasword").css('border', '1px solid #ced4da');
                $('#submitForm').prop('disabled', false);
            }
        });
        $('#nameEdit').keyup(function() {
            debugger;
            $('#submitForm').prop('disabled', false);
        })
        $('#emailEdit').keyup(function() {
            $('#submitForm').prop('disabled', false);
        })
        $('#phoneEdit').keyup(function() {
            $('#submitForm').prop('disabled', false);
        })
        $('#typeEdit').change(function() {
            $('#submitForm').prop('disabled', false);
        })
        $('#editForm').submit(function (e) { 
            const data = $(this).serializeArray()
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "/users/{{$profile->userId}}/save-password",
                data: data,
                dataType: "json",
                success: function (response) {
                    if(response && response.result === 'ok'){
                        tata.success('Thay đổi thành công', response.message, {
                            duration: 5000,
                            animate: 'slide',
                            closeBtn: true,
                        });
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
    });
</script>
@endsection

