@extends('layouts.master')
@section('content')
    <div class="content"> 
        <div class="container-fluid"> 
            <div class="row"> 
                <div class="col-12"> 
                    <div class="page-title-box"> 
                        <div class="page-title-right"> 
                            <ol class="breadcrumb m-0"> 
                                <li class="breadcrumb-item"> <a href="javascript: void(0);"> Trang chủ</a> </li> 
                                <li class="breadcrumb-item"> <a href="javascript: void(0);"> Tài khoản</a> </li> 
                                <li class="breadcrumb-item active"> Danh sách</li> 
                            </ol> 
                        </div> 
                        <h4 class="page-title"> Quản lý tài khoản</h4> 
                    </div> 
                </div> 
            </div> 
            <a type="button" href="{{ route('master.get.user.create') }}"
                class="btn btn-twitter waves-effect waves-light mb-3"> <span class="btn-label">  <i
                        class="fas fa-plus"> </i> </span>  Thêm mới tài khoản</a> 
            <div class="row"> 
                <div class="col-12"> 
                    <div class="card-box"> 
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;"> 
                            <thead> 
                                <tr> 
                                    <th> #</th> 
                                    <th> Tên Tài khoản</th> 
                                    <th> Hình ảnh</th> 
                                    <th> Email</th> 
                                    <th> Loại Tài Khoản</th> 
                                    <th> Thao tác</th> 
                                </tr> 
                            </thead> 
                            <tbody> 
                                @php
                                    $number = 1;
                                @endphp
                                @if(@isset($users) >  0)
                                    @foreach ($users as $user)
                                    <tr data-user-id='{{$user-> id}}'> 
                                        <td> {{$number++}}</td> 
                                        <td> 
                                            <h6 class="font-weight-bold"> {{$user-> userinfo-> name}}</h6> 
                                        </td> 
                                        <td> 
                                            <img style="width: 80px; height: 80px;border-radius:50%;object-fit: cover " src="{{$user-> userinfo-> avatar!=null ? $user-> userinfo-> avatar : '/admin/assets/images/undraw_profile.svg'}}" alt=""> 
                                        </td> 
                                        <td> 
                                            <h6> {{$user-> userinfo-> email}}</h6> 
                                            <h6> {{$user-> userinfo-> contact}}</h6> 
                                        </td> 
                                        <td> 
                                            <h6 class="font-weight-bold"> {{$user-> type}}</h6> 
                                        </td> 
                                        <td>  
                                            <a class="btn waves-effect waves-light btn-success" href="{{route('master.get.user.edit', $user-> id)}}" > <i class="mdi mdi-pencil-outline"> </i> </a> 
                                            <button class="btn waves-effect waves-light btn-danger" onclick="openPopupDelete('{{$user-> id}}')"> <i class="mdi mdi-trash-can">  </i> </button> 
                                        </td> 
                                    </tr> 
                                    @endforeach
                                @else
                                    <tr> 
                                        <td colspan="12"> Không có dữ liệu</td> 
                                    </tr> 
                                @endif
                            </tbody> 
                        </table> 
                    </div> 
                </div> 
            </div> 
        </div> 
        <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true"> 
            <div class="modal-dialog"> 
                <div class="modal-content"> 
                    <div class="modal-header"> 
                        <h5 class="modal-title" id="titleDeleteProduct"> Xóa bài viết</h5> 
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"> ×</button> 
                    </div> 
                    <div class="modal-body"> 
                        <p> Bạn có chắc chắn muốn xóa bài viết này không ?</p> 
                    </div> 
                    <div class="modal-footer"> 
                        <input id="id-article-hidden-input" type="hidden"> 
                        <button id="confirmDeleteBtn" type="button" class="btn btn-danger" onclick='confirmDelete(this)'> Xóa</button> 
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal"> Đóng</button> 
                    </div> 
                </div> 
            </div> 
        </div> 
    </div> 
@stop
@section('script')

<script> 

    function openPopupDelete(id) {  
        $('#confirmDeleteBtn').attr('data-id', id);
        $('#deleteUser').modal('show');
    }

    function confirmDelete(target){
        let id = $(target).attr('data-id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "delete",
            url: "{{env('APP_URL')}}/user/" + id,
            data: "data",
            dataType: "json",
            success: function (res) {
                if(res.success === true){
                    $('#deleteUser').modal('hide');
                    var table = $('#datatable').DataTable();
                    var row = $('#datatable').find('tr[data-user-id="'+ id +'"]');
                    table.row(row).remove().draw();
                    tata.success('Thành công', 'Đã xóa bài viết', {
                        animate: 'slide',
                        closeBtn: true,
                    })
                }
                else{
                    tata.error('Lỗi', res.errors, {
                        animate: 'slide',
                        closeBtn: true,
                    })
                }
            },
            error: function(){
                tata.error('Lỗi', "Xóa thất bại", {
                    animate: 'slide',
                    closeBtn: true,
                });
            }
        });
    }

    function toggleVisiable(target){
        let id = $(target).parents('tr').attr('data-article-id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "{{env('APP_URL')}}/user/" + id + "/toggle-visiable",
            dataType: "json",
            success: function (res) {
                if(res.success === true){
                    if(res.isHidden){
                        $(target).removeClass('btn-success');
                        $(target).addClass('btn-secondary');
                        $(target).find('i').removeClass('fa-eye');
                        $(target).find('i').addClass('fa-eye-slash');
                    }
                    else{
                        $(target).removeClass('btn-secondary');
                        $(target).addClass('btn-success');
                        $(target).find('i').removeClass('fa-eye-slash');
                        $(target).find('i').addClass('fa-eye');
                    }

                    tata.success('Thành công', 'Đã thay đổi thành công', {
                        animate: 'slide',
                        closeBtn: true,
                    })
                }
                else{
                    tata.error('Lỗi', res.errors, {
                        animate: 'slide',
                        closeBtn: true,
                    })
                }
            },
            error: function(){
                tata.error('Lỗi', "Cập nhật thất bại", {
                    animate: 'slide',
                    closeBtn: true,
                });
            }
        });
    }
</script> 
@stop

