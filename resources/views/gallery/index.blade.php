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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Gallary</a></li>
                                <li class="breadcrumb-item active">Quản lý Gallary nổi bật</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Quản lý Gallary nổi bật</h4>
                    </div>
                </div>
            </div>
            <a type="button"  onclick="saveOrder()" class="btn btn-facebook waves-effect waves-light mb-3"><span class="btn-label"><i class="fas fa-save"></i></span>Lưu thứ tự</a>
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <table class="table datatable table-bordered dt-responsive nowrap  datatable-hover-move"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>order</th>
                                    <th>id</th>
                                    <th>#</th>
                                    <th>Logo</th>
                                    <th>Thông tin</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (@isset($profiles) > 0)
                                    @foreach ($profiles as $profile)
                                        <tr data-gallery-id='{{ $profile->id }}'>
                                            <td >{{ $profile->order }}</td>
                                            <td >{{ $profile->id }}</td>
                                            <td class="text-center"><i class="ion ion-md-more"></i></td>
                                            <td>
                                                <img style="width: 180px; height: 100px;border-radius:5%;object-fit: cover; background: #f1f1f1 " src="{{$profile->avatar!=null ? $profile->avatar : '/admin/assets/images/no-logo.png'}}" alt="">
                                            </td>
                                            <td>
                                                <h5>{{$profile->name}}</h5>
                                                <h6>{{$profile->email}}</h6>
                                                <h6>{{$profile->contact}}</h6>
                                            </td>
                                            <td>
                                                <input onchange="toggleVisiable(this)" type="checkbox" {{$profile->isPublic === '1' ? 'checked=""' : null}} data-plugin="switchery" data-color="#9261c6" data-size="small">
                                            </td>
                                            <td> 
                                                <button disabled class="btn waves-effect waves-light btn-success"><i class="mdi mdi-pencil-outline"> </i></button>
                                                <button disabled class="btn waves-effect waves-light btn-danger" onclick="openPopupDelete('{{$profile->id}}')"><i class="mdi mdi-trash-can"> </i></button>
                                            </td>  
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="12" class="text-center">Không có dữ liệu</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
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
        $('#deleteBanner').modal('show');
    }

    function confirmDelete(target) {
        let id = $(target).attr('data-id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "delete",
            url: "{{ env('APP_URL') }}/management/banner/" + id,
            data: "data",
            dataType: "json",
            success: function(res) {
                if (res.success === true) {
                    $('#deleteBanner').modal('hide');
                    var table = $('.datatable').DataTable();
                    var row = $('.datatable').find('tr[data-banner-id="' + id + '"]');
                    table.row(row).remove().draw();
                    tata.success('Thành công', 'Đã xóa banner', {
                        animate: 'slide',
                        closeBtn: true,
                    })
                } else {
                    tata.error('Lỗi', res.errors, {
                        animate: 'slide',
                        closeBtn: true,
                    })
                }
            },
            error: function() {
                tata.error('Lỗi', "Xóa thất bại", {
                    animate: 'slide',
                    closeBtn: true,
                });
            }
        });
    }

    function toggleVisiable(target){
        let id = $(target).parents('tr').attr('data-gallery-id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "{{env('APP_URL')}}/gallery/" + id + "/toggle-visiable",
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

    function saveOrder() {
        $('#pageLoader').show();
        let orderData = [];
        let table = $('.datatable').DataTable();
        let rows = table.rows().data().rowReorder();
        for (let i = 0; i < rows.length; i++) {
            orderData.push(row = rows[i][1]);
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "post",
            url: "{{route('master.post.gallery.save-order')}}",
            dataType: "json",
            data: {
                orderData: orderData,
            },
            success: function(res) {
                $('#pageLoader').hide();
                if (res.success === true) {
                    tata.success('Thành công', 'Đã lưu thứ tự thành công', {
                        animate: 'slide',
                        closeBtn: true,
                    })
                } else {
                    tata.error('Lỗi', res.errors, {
                        animate: 'slide',
                        closeBtn: true,
                    })
                }
            },
            error: function() {
                $('#pageLoader').hide();
                tata.error('Lỗi', "Lưu thất bại", {
                    animate: 'slide',
                    closeBtn: true,
                });
            }
        });
    }
</script>
<script>
    $(document).ready(function() {
       var table = $('.datatable').DataTable( {
           rowReorder: true,
           "columnDefs": [
               { "visible": false, "targets": [0,1] },

           ]
       });
   });
</script>
@stop