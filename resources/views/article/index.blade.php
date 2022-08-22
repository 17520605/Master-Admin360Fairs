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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Bài viết</a></li>
                                <li class="breadcrumb-item active">Danh sách</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Quản lý bài viết</h4>
                    </div>
                </div>
            </div>
            <a type="button" href="{{ route('master.get.article.create') }}"
                class="btn btn-twitter waves-effect waves-light mb-3"><span class="btn-label"> <i
                        class="fas fa-plus"></i></span> Thêm mới bài viết</a>
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Hình ảnh</th>
                                    <th>Tên bài viết</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(@isset($articles) > 0)
                                    @php
                                        $number = 1;
                                    @endphp
                                    @foreach ($articles as $article)
                                    <tr data-article-id='{{$article->id}}'>
                                        <td>{{$number++}}</td>
                                        <td>
                                            <img src="{{$article->banner}}" class="rounded" height="120" width="200" style="object-fit: cover;">
                                        </td>
                                        <td>
                                            <h6 href="app-product.html" class="font-weight-bold text-width-500">{{$article->title}}</h6>
                                            <div class="name-author">{{$article->author}}</div>
                                        </td>
                                        <td>
                                            @if ($article->isPublic === '1')
                                                @php
                                                    $isPublic = 'checked=""';
                                                @endphp
                                            @else
                                                @php
                                                    $isPublic = '';
                                                @endphp
                                            @endif
                                            <input onchange="toggleVisiable(this)" type="checkbox" {{$isPublic}} data-plugin="switchery" data-color="#9261c6" data-size="small">
                                        </td>
                                        <td>
                                            {{$article->created_at}}
                                        </td>
                                        <td> 
                                            <a class="btn waves-effect waves-light btn-success" href="{{route('master.get.article.edit', $article->id)}}" ><i class="mdi mdi-pencil-outline"></i></a>
                                            <button class="btn waves-effect waves-light btn-danger" onclick="openPopupDelete('{{$article->id}}')"><i class="mdi mdi-trash-can"> </i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="12">Không có dữ liệu</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteArticle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titleDeleteProduct">Xóa bài viết</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có chắc chắn muốn xóa bài viết này không ?</p>
                    </div>
                    <div class="modal-footer">
                        <input id="id-article-hidden-input" type="hidden">
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
        $('#deleteArticle').modal('show');
    }

    function confirmDelete(target){
        let id = $(target).attr('data-id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "delete",
            url: "{{env('APP_URL')}}/articles/" + id,
            data: "data",
            dataType: "json",
            success: function (res) {
                if(res.success === true){
                    $('#deleteArticle').modal('hide');
                    var table = $('#datatable').DataTable();
                    var row = $('#datatable').find('tr[data-article-id="'+ id +'"]');
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
            url: "{{env('APP_URL')}}/articles/" + id + "/toggle-visiable",
            dataType: "json",
            success: function (res) {
                if(res.success === true){
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

