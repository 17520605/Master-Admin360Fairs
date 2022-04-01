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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Đánh giá </a></li>
                                <li class="breadcrumb-item active">Quản lý đánh giá </li>
                            </ol>
                        </div>
                        <h4 class="page-title">Quản lý đánh giá </h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap "
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th style="width: 15%;">Thông tin thành viên</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Rating</th>
                                    <th>Trạng thái</th>
                                    <th>Nội dung</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $key => $comment)
                                    <tr data-comment-id="{{$comment->id}}">
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <span class="font-weight-bold">{{$comment->name}}</span>
                                            <span class="d-flex">{{$comment->email}}</span>
                                            <span class="d-flex">{{$comment->phone}}</span>
                                        </td>
                                        <td>
                                            <h6 href="#" class="font-weight-bold">{{$comment->product_name}}</h6>
                                            <div class="d-flex">
                                                <span class="sa-meta__item" >SKU: <span class="st-copy font-weight-bold">{{$comment->product_sku}}</span></span>
                                            </div>
                                        </td>
                                        
                                        <td>{{$comment->rate}} <i class="fas fa-star stars_icon"></i></td>
                                        <td>
                                            <button onclick="toggleVisiable(this)" class="btn waves-effect waves-light {{$comment->is_hidden != 0 ? 'btn-secondary' : 'btn-success'  }}">
                                                <i class="fas {{$comment->is_hidden != 0 ? 'fa-eye-slash' : 'fa-eye'  }}"></i>
                                            </button> </a>
                                        </td>
                                        <td>{{$comment->content}}</td>
                                        <td>
                                            <button class="btn waves-effect waves-light btn-danger" onclick="openPopupDelete('{{ $comment->id }}')"><i class="mdi mdi-trash-can"> </i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteRating" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titleDeleteRating">Xóa bình luận</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có chắc chắn muốn xóa bình luận này không ?</p>
                    </div>
                    <div class="modal-footer">
                        <button id="confirmDeleteBtn" type="button" class="btn btn-danger" onclick='confirmDelete(this)'>Xóa</button>
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Đóng</button>
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
        $('#deleteRating').modal('show');
    }

    function confirmDelete(target){
        let id = $(target).attr('data-id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "delete",
            url: "{{env('APP_URL')}}/management/comment/" + id,
            data: "data",
            dataType: "json",
            success: function (res) {
                if(res.success === true){
                    $('#deleteRating').modal('hide');
                    var table = $('#datatable').DataTable();
                    var row = $('#datatable').find('tr[data-comment-id="'+ id +'"]');
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
            let id = $(target).parents('tr').attr('data-comment-id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "post",
                url: "{{env('APP_URL')}}/management/comment/" + id + "/toggle-visiable",
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
